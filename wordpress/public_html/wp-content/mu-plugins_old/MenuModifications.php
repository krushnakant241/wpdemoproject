<?php

add_action('admin_head', function () {
?><style>
		#adminmenu li.wp-menu-separator {
			margin: 0;
			position: relative;
			height: 16px;
			padding-left: 5px;
		}

		#adminmenu li.wp-menu-separator:before {
			content: "Misc";
			line-height: 16px;
			font-size: 11px;
			font-weight: bold;
			margin: 0 0 0 3px;
			position: relative;
			top: -2px;
		}

		#adminmenu li.wp-menu-separator.--label-content:before {
			content: "Content";
		}

		#adminmenu li.wp-menu-separator.--label-settings:before {
			content: "Settings";
		}

		#collapse-button {
			display: none;
		}
	</style><?php

					global $menu;

					foreach ($menu as $index => $menuItem) {
						$checkVal = (string)$menuItem[4];
						if ($checkVal == "wp-menu-separator") {
							$checkSep = (string)$menu[$index][2];
							switch ($checkSep) {
								case "separator1":
									$menu[$index][4] .= " --label-content";
									break;
								case "separator2":
									$menu[$index][4] .= " --label-settings";
									break;
							}
						}
					}
				});
