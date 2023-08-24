<?php
/**
 * Class FilemanagerModel
 */
class FilemanagerModel {

	private $controller;

	public function __construct($controller) {
		$this->controller = $controller;
	}

	public function get_path_components( $dir = '' ) {
		$dir_names = explode('/', $dir);
		$path = '';

		$components = array();
		$component = array();

		$component['name'] = BWG()->upload_dir;
		$component['path'] = $path;
		$components[] = $component;

		for ( $i = 0; $i < count($dir_names); $i++ ) {
			$dir_name = $dir_names[$i];
			if ( $dir_name == '' ) {
				continue;
			}
			$path .= ( ($path == '') ? $dir_name : '/' . $dir_name );
			$component = array();
			$component['name'] = $dir_name;
			$component['path'] = $path;
			$components[] = $component;
		}
		return $components;
	}

  /**
   * Get file lists.
   *
   * @param array $params
   * @return array
   */
	public function get_file_lists( $params = array() ) {
		global $wpdb;
		$results = array();
		$results['num_rows'] = 0;
		$results['files'] = array();
		$dir = $params['dir'];
		$orderby = $params['orderby'];
		$order = $params['order'];
		if ( $orderby != 'size' && $orderby != 'name' ) {
		  $orderby = '`date_modified`';
		}
		if ( $order != 'asc' ) {
		  $order = 'DESC';
		}
		$search = $params['search'];
		$page_num = $params['page_num'];
		$page_per = $params['page_per'];

		$query = ' SELECT * FROM `' . $wpdb->prefix . 'bwg_file_paths`';
		$query .= ' WHERE `path` = "%s"';
		$prepareArgs = array($dir);

		if ( !current_user_can('manage_options') && BWG()->options->image_role ) {
		  $query .= " AND `author`= %d";
		  $prepareArgs[] = get_current_user_id();
		}
		if ( $search ) {
			$query .= ' AND ((filename LIKE %s) OR (alt LIKE %s)) ';
			$prepareArgs[] = "%" . $search . "%";
			$prepareArgs[] = "%" . $search . "%";
		}
		if ( $orderby == 'size') {
			$orderby = 'CAST('. $orderby .' AS unsigned)';
		}
		
		$query .= ' ORDER BY `is_dir` DESC, '. $orderby . ' ' . $order;
    // Get total num rows.
    $results['page_per'] = $page_per;
    $results['num_rows'] = $wpdb->get_var( $wpdb->prepare(str_replace('SELECT *', 'SELECT COUNT(*)', $query), $prepareArgs) );
    $page_mix = $page_num * $page_per;
    $query .= ' LIMIT %d, %d';
    $prepareArgs[] = $page_mix;
    $prepareArgs[] = $page_per;
    $prepared_query = $wpdb->prepare($query, $prepareArgs);
    $items = $wpdb->get_results($prepared_query, 'ARRAY_A');
    if ( empty($items) && empty($search) ) {
      $params['dir'] = BWG()->upload_dir . $dir;
      $params['path'] = $dir;
      $this->files_parsing_db( $params );
      $items = $wpdb->get_results($prepared_query, 'ARRAY_A');
      $results['num_rows'] = $wpdb->get_var( str_replace('SELECT *', 'SELECT COUNT(*)', $prepared_query));
    }
    if ( !empty($items) ) {
      foreach( $items as $item ) {
        $thumb = BWG()->plugin_url . $item['thumb'];
        if ( $item['is_dir'] == 0 ) {
          $thumb = $this->controller->get_uploads_url() .''. $item['path'] .''. $item['thumb'];
        }
        $item['thumb'] = $thumb;
        $results['files'][] = $item;
      }
    }
    return $results;
	}

  /**
   * Is img.
   * @param $file_type
   *
   * @return bool
   */
	private function is_img($file_type) {
		switch ($file_type) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'bmp':
			case 'gif':
			case 'svg':
				return true;
			break;
		}
		return false;
	}

  /**
   * Get dir contents.
   *
   * @param        $dir
   * @param string $filter
   * @param array  $results
   *
   * @return array
   */
	function get_dir_contents( $dir, $filter = '', &$results = array() ) {
		$files = scandir($dir);
		if ( !empty($files) ) {
			foreach ( $files as $key => $value ) {
				if ( in_array($value, array('.','..','thumb','.original') ) ) continue;
				$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
				if ( !is_dir($path) ) {
					if ( empty($filter) || preg_match($filter, $path) ) {
						$results[] = $path;
					}
				} else {
					$results[] = $path;
					// is recursive
					// $this->get_dir_contents($path, $filter, $results);
				}
			}
		}
		return $results;
	}

  /**
   * Get all files.
   *
   * @param array $params
   *
   * @return array
   */
	function get_all_files( $params = array() ) {
		global $wpdb;
		$dir = $params['dir'];
		$search = $params['search'];
		$orderby = $params['orderby'];
		$order = $params['order'];
		if ( $orderby != 'size' && $orderby != 'name' ) {
		  $orderby = '`date_modified`';
		}
		if ( $order != 'asc' ) {
		  $order = 'DESC';
		}

		$query = ' SELECT * FROM `' . $wpdb->prefix . 'bwg_file_paths`';
		$query .= ' WHERE `path` = "%s"';
		$prepareArgs = array($dir);
		if ( !current_user_can('manage_options') && BWG()->options->image_role ) {
		  $query .= " AND `author`= %d";
		  $prepareArgs[] = get_current_user_id();
		}
			 if ( $search ) {
		  $query .= ' AND ((filename LIKE %s) OR (alt LIKE %s)) ';
		  $prepareArgs[] = "%" . $search . "%";
		  $prepareArgs[] = "%" . $search . "%";
		}

		$query .= ' ORDER BY `is_dir` DESC, ' . $orderby . ' ' . $order;
		$items = $wpdb->get_results($wpdb->prepare($query, $prepareArgs), 'ARRAY_A');
		$results = array();
		if ( !empty($items) ) {
		  foreach( $items as $item ) {
			$thumb = BWG()->plugin_url . $item['thumb'];
			if ( $item['is_dir'] == 0 ) {
			  $thumb = $this->controller->get_uploads_url() .''. $item['path'] .''. $item['thumb'];
			}
			$item['thumb'] = $thumb;
			$results[] = $item;
		  }
		}
		return $results;
	}

  /**
   * Files parsing db.
   *
   * @param array $params
   */
  function files_parsing_db( $params = array() ) {
    global $wpdb;
    $dir = $params['dir'];
    $path = $params['path'];
    $valid_types = $params['valid_types'];
    $truncate = !empty($params['truncate']) ? TRUE : FALSE;
    $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
    $data = array();
    $dirs = array();
    $files = array();
    $items = $this->get_dir_contents($dir);
    if ( !empty($items) ) {
      foreach ( $items as $item ) {
        $value = str_replace($dir, '', $item);
        $value = explode(DIRECTORY_SEPARATOR, $value);
        $name = end($value);
        $author = $wpdb->get_var($wpdb->prepare("SELECT `author` FROM `" . $wpdb->prefix . "bwg_file_paths` WHERE `name` = '%s'", $name));
        $file = array();
        $file['path'] = $path;
        $file['name'] = $name;
        $file['author'] = !empty($author) ? $author : 1;
        if ( is_dir($item) == TRUE ) {
          $file['is_dir'] = 1;
          $file['filename'] = str_replace("_", " ", $name);
          $file['alt'] = str_replace("_", " ", $name);
          $file['thumb'] = '/filemanager/images/dir.png';
          $dirs[] = $file;
        }
        else {
          $file['is_dir'] = 0;
          $filename = substr($name, 0, strrpos($name, '.'));
          $file['filename'] = str_replace("_", " ", $filename);
          $file_extension = explode('.', $name);
          $file['type'] = strtolower(end($file_extension));
          $file['thumb'] = 'thumb/' . $name;
          if ( ($valid_types[0] != '*') && (in_array($file['type'], $valid_types) == FALSE) ) {
            continue;
          }
          $file_size_kb = (int) (filesize($item) / 1024);
          $file['size'] = $file_size_kb . ' KB';
          $image_info = getimagesize(htmlspecialchars_decode($item, ENT_COMPAT | ENT_QUOTES));
          if ($this->is_img($file['type'])) {
            if ($file['type'] === 'svg') {
              $file_size_array = WDWLibrary::get_svg_size(BWG()->upload_url . $file['path'] . $file['name']);
              if( !empty($file_size_array['width']) && !empty($file_size_array['height']) ) {
                $file['resolution'] = $file_size_array['width'] . " x " . $file_size_array['height'] . " px ";
                $file['resolution_thumb'] = $file_size_array['width'] . "x" . $file_size_array['height'];
              } else {
                $file['resolution'] = WDWLibrary::get('upload_img_width') . " x " . WDWLibrary::get('upload_img_height') . " px ";
                $file['resolution_thumb'] = WDWLibrary::get('upload_thumb_width') . "x" . WDWLibrary::get('upload_thumb_height');
              }
            } else {
              $file['resolution'] = $image_info[0] . ' x ' . $image_info[1] . ' px';
              $file['resolution_thumb'] = WDWLibrary::get_thumb_size("/" . $file['thumb']);
            }
          } else {
            $file['resolution'] = '';
            $file['resolution_thumb'] = '';
          }
          $exif = WDWLibrary::read_image_metadata($dir . '/.original/' . $name);
          $file['alt'] = BWG()->options->read_metadata && $exif['title'] ? $exif['title'] : str_replace("_", " ", $filename);
          $file['credit'] = !empty($exif['credit']) ? $exif['credit'] : '';
          $file['aperture'] = !empty($exif['aperture']) ? $exif['aperture'] : '';
          $file['camera'] = !empty($exif['camera']) ? $exif['camera'] : '';
          $file['caption'] = !empty($exif['caption']) ? $exif['caption'] : '';
          $file['iso'] = !empty($exif['iso']) ? $exif['iso'] : '';
          $file['orientation'] = !empty($exif['orientation']) ? $exif['orientation'] : '';
          $file['copyright'] = !empty($exif['copyright']) ? $exif['copyright'] : '';
          $file['tags'] = !empty($exif['tags']) ? $exif['tags'] : '';
          $file['date_modified'] = date("Y-m-d H:i:s", filemtime($item));
          $files[] = $file;
        }

      }
      $data = array_merge($dirs, $files);
      $insert = 0;
      $tbl = $wpdb->prefix . 'bwg_file_paths';
      if ( !empty($params['refresh']) ) {
        $wpdb->delete($tbl, array( 'path' => $path ), array( '%s' ));
      }
      foreach ( $data as $val ) {
        $insert = $wpdb->insert($tbl, $val);
      }

      return $insert;
    }
  }

  /**
   * Set the passed value to the REQUEST to make it possible to get from other page.
   *
   * @param $key
   * @param $default
   *
   * @return mixed
   */
  public function get_from_session( $key, $default ) {
    // Sanitize the get value.
    $value = WDWLibrary::get($key, $default, 'sanitize_text_field', 'REQUEST');

    // Set the REQUEST value to make it possible to get from other page.
    $_REQUEST[$key] = $value;

    // Return the escaped value to use it in HTML.
    return esc_html($value);
  }
}
