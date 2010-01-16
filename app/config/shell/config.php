<?php
$languages = unserialize(config('languages'));
$timezones = array('Africa/Abidjan','Africa/Accra','Africa/Addis_Ababa','Africa/Algiers','Africa/Asmara','Africa/Asmera','Africa/Bamako','Africa/Bangui','Africa/Banjul','Africa/Bissau','Africa/Blantyre','Africa/Brazzaville','Africa/Bujumbura','Africa/Cairo','Africa/Casablanca','Africa/Ceuta','Africa/Conakry','Africa/Dakar','Africa/Dar_es_Salaam','Africa/Djibouti','Africa/Douala','Africa/El_Aaiun','Africa/Freetown','Africa/Gaborone','Africa/Harare','Africa/Johannesburg','Africa/Kampala','Africa/Khartoum','Africa/Kigali','Africa/Kinshasa','Africa/Lagos','Africa/Libreville','Africa/Lome','Africa/Luanda','Africa/Lubumbashi','Africa/Lusaka','Africa/Malabo','Africa/Maputo','Africa/Maseru','Africa/Mbabane','Africa/Mogadishu','Africa/Monrovia','Africa/Nairobi','Africa/Ndjamena','Africa/Niamey','Africa/Nouakchott','Africa/Ouagadougou','Africa/Porto-Novo','Africa/Sao_Tome','Africa/Timbuktu','Africa/Tripoli','Africa/Tunis','Africa/Windhoek','America/Adak','America/Anchorage','America/Anguilla','America/Antigua','America/Araguaina','America/Argentina/Buenos_Aires','America/Argentina/Catamarca','America/Argentina/ComodRivadavia','America/Argentina/Cordoba','America/Argentina/Jujuy','America/Argentina/La_Rioja','America/Argentina/Mendoza','America/Argentina/Rio_Gallegos','America/Argentina/San_Juan','America/Argentina/San_Luis','America/Argentina/Tucuman','America/Argentina/Ushuaia','America/Aruba','America/Asuncion','America/Atikokan','America/Atka','America/Bahia','America/Barbados','America/Belem','America/Belize','America/Blanc-Sablon','America/Boa_Vista','America/Bogota','America/Boise','America/Buenos_Aires','America/Cambridge_Bay','America/Campo_Grande','America/Cancun','America/Caracas','America/Catamarca','America/Cayenne','America/Cayman','America/Chicago','America/Chihuahua','America/Coral_Harbour','America/Cordoba','America/Costa_Rica','America/Cuiaba','America/Curacao','America/Danmarkshavn','America/Dawson','America/Dawson_Creek','America/Denver','America/Detroit','America/Dominica','America/Edmonton','America/Eirunepe','America/El_Salvador','America/Ensenada','America/Fort_Wayne','America/Fortaleza','America/Glace_Bay','America/Godthab','America/Goose_Bay','America/Grand_Turk','America/Grenada','America/Guadeloupe','America/Guatemala','America/Guayaquil','America/Guyana','America/Halifax','America/Havana','America/Hermosillo','America/Indiana/Indianapolis','America/Indiana/Knox','America/Indiana/Marengo','America/Indiana/Petersburg','America/Indiana/Tell_City','America/Indiana/Vevay','America/Indiana/Vincennes','America/Indiana/Winamac','America/Indianapolis','America/Inuvik','America/Iqaluit','America/Jamaica','America/Jujuy','America/Juneau','America/Kentucky/Louisville','America/Kentucky/Monticello','America/Knox_IN','America/La_Paz','America/Lima','America/Los_Angeles','America/Louisville','America/Maceio','America/Managua','America/Manaus','America/Marigot','America/Martinique','America/Mazatlan','America/Mendoza','America/Menominee','America/Merida','America/Mexico_City','America/Miquelon','America/Moncton','America/Monterrey','America/Montevideo','America/Montreal','America/Montserrat','America/Nassau','America/New_York','America/Nipigon','America/Nome','America/Noronha','America/North_Dakota/Center','America/North_Dakota/New_Salem','America/Panama','America/Pangnirtung','America/Paramaribo','America/Phoenix','America/Port-au-Prince','America/Port_of_Spain','America/Porto_Acre','America/Porto_Velho','America/Puerto_Rico','America/Rainy_River','America/Rankin_Inlet','America/Recife','America/Regina','America/Resolute','America/Rio_Branco','America/Rosario','America/Santiago','America/Santo_Domingo','America/Sao_Paulo','America/Scoresbysund','America/Shiprock','America/St_Barthelemy','America/St_Johns','America/St_Kitts','America/St_Lucia','America/St_Thomas','America/St_Vincent','America/Swift_Current','America/Tegucigalpa','America/Thule','America/Thunder_Bay','America/Tijuana','America/Toronto','America/Tortola','America/Vancouver','America/Virgin','America/Whitehorse','America/Winnipeg','America/Yakutat','America/Yellowknife','Antarctica/Casey','Antarctica/Davis','Antarctica/DumontDUrville','Antarctica/Mawson','Antarctica/McMurdo','Antarctica/Palmer','Antarctica/Rothera','Antarctica/South_Pole','Antarctica/Syowa','Antarctica/Vostok','Arctic/Longyearbyen','Asia/Aden','Asia/Almaty','Asia/Amman','Asia/Anadyr','Asia/Aqtau','Asia/Aqtobe','Asia/Ashgabat','Asia/Ashkhabad','Asia/Baghdad','Asia/Bahrain','Asia/Baku','Asia/Bangkok','Asia/Beirut','Asia/Bishkek','Asia/Brunei','Asia/Calcutta','Asia/Choibalsan','Asia/Chongqing','Asia/Chungking','Asia/Colombo','Asia/Dacca','Asia/Damascus','Asia/Dhaka','Asia/Dili','Asia/Dubai','Asia/Dushanbe','Asia/Gaza','Asia/Harbin','Asia/Ho_Chi_Minh','Asia/Hong_Kong','Asia/Hovd','Asia/Irkutsk','Asia/Istanbul','Asia/Jakarta','Asia/Jayapura','Asia/Jerusalem','Asia/Kabul','Asia/Kamchatka','Asia/Karachi','Asia/Kashgar','Asia/Katmandu','Asia/Kolkata','Asia/Krasnoyarsk','Asia/Kuala_Lumpur','Asia/Kuching','Asia/Kuwait','Asia/Macao','Asia/Macau','Asia/Magadan','Asia/Makassar','Asia/Manila','Asia/Muscat','Asia/Nicosia','Asia/Novosibirsk','Asia/Omsk','Asia/Oral','Asia/Phnom_Penh','Asia/Pontianak','Asia/Pyongyang','Asia/Qatar','Asia/Qyzylorda','Asia/Rangoon','Asia/Riyadh','Asia/Saigon','Asia/Sakhalin','Asia/Samarkand','Asia/Seoul','Asia/Shanghai','Asia/Singapore','Asia/Taipei','Asia/Tashkent','Asia/Tbilisi','Asia/Tehran','Asia/Tel_Aviv','Asia/Thimbu','Asia/Thimphu','Asia/Tokyo','Asia/Ujung_Pandang','Asia/Ulaanbaatar','Asia/Ulan_Bator','Asia/Urumqi','Asia/Vientiane','Asia/Vladivostok','Asia/Yakutsk','Asia/Yekaterinburg','Asia/Yerevan','Atlantic/Azores','Atlantic/Bermuda','Atlantic/Canary','Atlantic/Cape_Verde','Atlantic/Faeroe','Atlantic/Faroe','Atlantic/Jan_Mayen','Atlantic/Madeira','Atlantic/Reykjavik','Atlantic/South_Georgia','Atlantic/St_Helena','Atlantic/Stanley','Australia/ACT','Australia/Adelaide','Australia/Brisbane','Australia/Broken_Hill','Australia/Canberra','Australia/Currie','Australia/Darwin','Australia/Eucla','Australia/Hobart','Australia/LHI','Australia/Lindeman','Australia/Lord_Howe','Australia/Melbourne','Australia/North','Australia/NSW','Australia/Perth','Australia/Queensland','Australia/South','Australia/Sydney','Australia/Tasmania','Australia/Victoria','Australia/West','Australia/Yancowinna','Europe/Amsterdam','Europe/Andorra','Europe/Athens','Europe/Belfast','Europe/Belgrade','Europe/Berlin','Europe/Bratislava','Europe/Brussels','Europe/Bucharest','Europe/Budapest','Europe/Chisinau','Europe/Copenhagen','Europe/Dublin','Europe/Gibraltar','Europe/Guernsey','Europe/Helsinki','Europe/Isle_of_Man','Europe/Istanbul','Europe/Jersey','Europe/Kaliningrad','Europe/Kiev','Europe/Lisbon','Europe/Ljubljana','Europe/London','Europe/Luxembourg','Europe/Madrid','Europe/Malta','Europe/Mariehamn','Europe/Minsk','Europe/Monaco','Europe/Moscow','Europe/Nicosia','Europe/Oslo','Europe/Paris','Europe/Podgorica','Europe/Prague','Europe/Riga','Europe/Rome','Europe/Samara','Europe/San_Marino','Europe/Sarajevo','Europe/Simferopol','Europe/Skopje','Europe/Sofia','Europe/Stockholm','Europe/Tallinn','Europe/Tirane','Europe/Tiraspol','Europe/Uzhgorod','Europe/Vaduz','Europe/Vatican','Europe/Vienna','Europe/Vilnius','Europe/Volgograd','Europe/Warsaw','Europe/Zagreb','Europe/Zaporozhye','Europe/Zurich','Indian/Antananarivo','Indian/Chagos','Indian/Christmas','Indian/Cocos','Indian/Comoro','Indian/Kerguelen','Indian/Mahe','Indian/Maldives','Indian/Mauritius','Indian/Mayotte','Indian/Reunion','Pacific/Apia','Pacific/Auckland','Pacific/Chatham','Pacific/Easter','Pacific/Efate','Pacific/Enderbury','Pacific/Fakaofo','Pacific/Fiji','Pacific/Funafuti','Pacific/Galapagos','Pacific/Gambier','Pacific/Guadalcanal','Pacific/Guam','Pacific/Honolulu','Pacific/Johnston','Pacific/Kiritimati','Pacific/Kosrae','Pacific/Kwajalein','Pacific/Majuro','Pacific/Marquesas','Pacific/Midway','Pacific/Nauru','Pacific/Niue','Pacific/Norfolk','Pacific/Noumea','Pacific/Pago_Pago','Pacific/Palau','Pacific/Pitcairn','Pacific/Ponape','Pacific/Port_Moresby','Pacific/Rarotonga','Pacific/Saipan','Pacific/Samoa','Pacific/Tahiti','Pacific/Tarawa','Pacific/Tongatapu','Pacific/Truk','Pacific/Wake','Pacific/Wallis','Pacific/Yap','Brazil/Acre','Brazil/DeNoronha','Brazil/East','Brazil/West','Canada/Atlantic','Canada/Central','Canada/East-Saskatchewan','Canada/Eastern','Canada/Mountain','Canada/Newfoundland','Canada/Pacific','Canada/Saskatchewan','Canada/Yukon','CET','Chile/Continental','Chile/EasterIsland','CST6CDT','Cuba','EET','Egypt','Eire','EST','EST5EDT','Etc/GMT','Etc/GMT+0','Etc/GMT+1','Etc/GMT+10','Etc/GMT+11','Etc/GMT+12','Etc/GMT+2','Etc/GMT+3','Etc/GMT+4','Etc/GMT+5','Etc/GMT+6','Etc/GMT+7','Etc/GMT+8','Etc/GMT+9','Etc/GMT-0','Etc/GMT-1','Etc/GMT-10','Etc/GMT-11','Etc/GMT-12','Etc/GMT-13','Etc/GMT-14','Etc/GMT-2','Etc/GMT-3','Etc/GMT-4','Etc/GMT-5','Etc/GMT-6','Etc/GMT-7','Etc/GMT-8','Etc/GMT-9','Etc/GMT0','Etc/Greenwich','Etc/UCT','Etc/Universal','Etc/UTC','Etc/Zulu','Factory','GB','GB-Eire','GMT','GMT+0','GMT-0','GMT0','Greenwich','Hongkong','HST','Iceland','Iran','Israel','Jamaica','Japan','Kwajalein','Libya','MET','Mexico/BajaNorte','Mexico/BajaSur','Mexico/General','MST','MST7MDT','Navajo','NZ','NZ-CHAT','Poland','Portugal','PRC','PST8PDT','ROC','ROK','Singapore','Turkey','UCT','Universal','US/Alaska','US/Aleutian','US/Arizona','US/Central','US/East-Indiana','US/Eastern','US/Hawaii','US/Indiana-Starke','US/Michigan','US/Mountain','US/Pacific','US/Pacific-New','US/Samoa','UTC','W-SU','WET','Zulu');
?>
<div id="config-container">
	<div class="tabs">
		<div class="tab-buttons">
			<a href="javascript:;" class="tab-button focus" title="personalize"><span><?php __('config/personalize'); ?></span></a>
			<a href="javascript:;" class="tab-button" title="regional"><span><?php __('config/regionalsettings'); ?></span></a>
			<a href="javascript:;" class="tab-button" title="administrative"><span><?php __('config/administrativesettings'); ?></span></a>
			<div class="clear"></div>
		</div>
		<div class="tab-content focus" id="personalize">
			<div class="frame">
				<p class="helptexttop"><?php __('config/personalize_top'); ?></p>
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td valign="top"><?php __('config/activetheme'); ?></td>
						<td>
							<select class="personalize_fields" name="theme">
								<?php
									$themes = unserialize(config('themes'));
									foreach ($themes as $theme) {
										$selected = '';
										if (personal('theme') == $theme) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $theme . '"' . $selected . '>' . $theme . '</a>';
									}
								?>
							</select>
							<div class="themescreensots">
								<a href="javascript:;"><img src="http://dump.iamjamoy.com/workingcopy.PNG" width="200" alt="" /></a>
							</div>
						</td>
					</tr>
					<tr>
						<td><?php __('config/background'); ?></td>
						<td><input type="button" class="button" value="<?php __('config/selectbackground'); ?>" /></td>
					</tr>
					<tr>
						<td><?php __('config/fontsize'); ?></td>
						<td>
							<select class="personalize_fields" name="font_size">
								<?php
									$fontsizes = array(90, 100, 125, 150);
									foreach ($fontsizes as $fontsize) {
										$selected = '';
										if (personal('font_size') == $fontsize) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $fontsize . '%"' . $selected . '>' . $fontsize . '%</a>';
									}
								?>
								<option>Custom</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><?php __('config/refreshrate'); ?></td>
						<td>
							<input type="text" class="text number personalize_fields" name="refresh_rate" value="5" style="width:40px;" />
						</td>
					</tr>
					<tr>
						<td><?php __('config/enableshortcut'); ?></td>
						<td>
							<input type="checkbox" class="checkbox personalize_fields" name="shortcuts" value="1"<?php echo (personal('shortcuts')) ? ' checked="checked"': ''; ?>/>
						</td>
					</tr>
					<tr>
						<td><?php __('config/developer'); ?></td>
						<td>
							<input type="checkbox" class="checkbox personalize_fields" name="developer" value="1"<?php echo (personal('developer')) ? ' checked="checked"': ''; ?>/>
						</td>
					</tr>
				</table>
				<p class="helptext"><?php __('config/helptext_personalize'); ?></p>
			</div>
		</div>		
		<div class="tab-content" id="regional">
			<div class="frame">
				<p class="helptexttop"><?php __('config/regional_top'); ?></p>
				<img src="<?php echo config('appurl'); ?>?res=app://config/shell/images/timezone.png" title="" border="0" alt="" />
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td><?php __('timezone'); ?></td>
						<td>
							<select style="width:200px;" class="regional_fields" name="timezone">
								<?php
									foreach ($timezones as $timezone) {
										$selected = '';
										if (personal('timezone') == strtolower($timezone)) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $timezone . '"' . $selected . '>' . $timezone . '</option>';
									}
								?>
							</select>
						</td>
						<td><?php __('language'); ?></td>
						<td>
							<select class="regional_fields" name="language">
								<?php
									foreach ($languages as $language => $name) {
										$selected = '';
										if (personal('language') == $language) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $language . '"' . $selected . '>' . $name . '</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><?php __('time'); ?></td>
						<td colspan="3">
							<input type="text" class="text number regional_fields" name="time_hour_now" value="<?php echo date('h'); ?>" style="width:24px;"/>
							<input type="text" class="text number regional_fields" name="time_minute_now" value="<?php echo date('i'); ?>" style="width:24px;"/>
							<select class="regional_fields" name="time_field_now">
								<option value="am"<?php echo (date('a') == 'am') ? ' selected="selected"': ''; ?>>AM</option>
								<option value="pm"<?php echo (date('a') == 'pm') ? ' selected="selected"': ''; ?>>PM</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><?php __('date'); ?></td>
						<td colspan="3">
							<input type="text" class="text number regional_fields" name="date_month_now" value="<?php echo date('m'); ?>" style="width:24px;"/>
							<input type="text" class="text number regional_fields" name="date_day_now" value="<?php echo date('d'); ?>" style="width:24px;"/>
							<input type="text" class="text number regional_fields" name="date_year_now" value="<?php echo date('Y'); ?>" style="width:40px;"/>
						</td>
					</tr>
					<tr>
						<td><?php __('format'); ?></td>
						<td colspan="3"><input type="text" class="text regional_fields" name="datetime_format" value="<?php echo personal('datetime_format'); ?>" style="width:80px;"/></td>
					</tr>
				</table>
				<p class="helptext"><?php __('config/helptext_regional'); ?></p>
			</div>
		</div>
		<div class="tab-content" id="administrative">
			<div class="frame">
				<p class="helptexttop"><?php __('config/administrative_top'); ?></p>
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td valign="top"><?php __('config/defaulttheme'); ?></td>
						<td>
							<select class="administrative_fields" name="theme">
								<?php
									$themes = unserialize(config('themes'));
									foreach ($themes as $theme) {
										$selected = '';
										if (config('theme') == $theme) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $theme . '"' . $selected . '>' . $theme . '</a>';
									}
								?>
							</select>
							<div class="themescreensots">
								<a href="javascript:;"><img src="http://dump.iamjamoy.com/workingcopy.PNG" width="200" alt="" /></a>
							</div>
						</td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/defaultlanguage'); ?></td>
						<td>
							<select class="administrative_fields" name="language">
								<?php
									foreach ($languages as $language => $name) {
										$selected = '';
										if ($name == config('language')) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $language . '"' . $selected . '>' . $name . '</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/defaulttimezone'); ?></td>
						<td>
							<select class="administrative_fields" name="timezone">
								<?php
									foreach ($timezones as $timezone) {
										$selected = '';
										if ($timezone == config('timezone')) {
											$selected = ' selected="selected"';
										}
										echo '<option value="' . $timezone . '"' . $selected . '>' . $timezone . '</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/allowautoupdate'); ?></td>
						<td><input type="checkbox" class="checkbox administrative_fields" name="autoupdate" value="1"<?php echo (config('autoupdate')) ? ' checked="checked"': ''; ?>/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/updateserver'); ?></td>
						<td><input type="text" class="text administrative_fields" name="updateserver" value="<?php echo config('updateserver'); ?>" style="width:260px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/pingserver'); ?></td>
						<td><input type="text" class="text administrative_fields" name="pingserver" value="<?php echo config('pingserver'); ?>" style="width:260px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/systemnamespace'); ?></td>
						<td><input type="text" class="text administrative_fields" name="namespace" value="<?php echo config('namespace'); ?>" style="width:220px;"/></td>
					<tr>
						<td valign="top"><?php __('config/systemurl'); ?></td>
						<td><input type="text" class="text administrative_fields" name="appurl" value="<?php echo config('appurl'); ?>" style="width:180px;"/></td>
					</tr>
					</tr>
					<tr>
						<td valign="top"><?php __('config/systemname'); ?></td>
						<td><input type="text" class="text administrative_fields" name="appname" value="<?php echo config('appname'); ?>" style="width:140px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/allowmultiple'); ?></td>
						<td><input type="checkbox" class="checkbox administrative_fields" name="multiuser" value="1"<?php echo (config('multiuser')) ? ' checked="checked"': ''; ?>/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/allowregistration'); ?></td>
						<td><input type="checkbox" class="checkbox administrative_fields" name="allowregistration" value="1"<?php echo (config('allowregistration')) ? ' checked="checked"': ''; ?>/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/dateformat'); ?></td>
						<td><input type="text" class="text administrative_fields" name="date_format" value="<?php echo config('date_format'); ?>" style="width:40px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/timeformat'); ?></td>
						<td><input type="text" class="text administrative_fields" name="time_format" value="<?php echo config('time_format'); ?>" style="width:40px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/allowbridging'); ?></td>
						<td><input type="checkbox" class="checkbox administrative_fields" name="accountbridging" value="1"<?php echo (config('accountbridging')) ? ' checked="checked"': ''; ?>/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/securitysalt'); ?></td>
						<td><input type="text" class="text administrative_fields" name="salt" value="<?php echo config('salt'); ?>" style="width:180px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/partitionperuser'); ?></td>
						<td><input type="text" class="text administrative_fields" name="partition_per_user" value="<?php echo config('partition_per_user'); ?>" style="width:120px;"/> bytes</td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/defaultrefreshrate'); ?></td>
						<td><input type="text" class="text number administrative_fields" name="refresh_rate" value="<?php echo config('refresh_rate'); ?>" style="width:24px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/mailserver'); ?></td>
						<td><input type="text" class="text administrative_fields" name="smtp_url" value="<?php echo config('smtp_url'); ?>" style="width:260px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/mailusername'); ?></td>
						<td><input type="text" class="text administrative_fields" name="smtp_username" value="<?php echo config('smtp_username'); ?>" style="width:150px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/mailpassword'); ?></td>
						<td><input type="password" class="text administrative_fields" name="smtp_password" value="<?php echo config('smtp_password'); ?>" style="width:120px;"/></td>
					</tr>
					<tr>
						<td valign="top"><?php __('config/mailport'); ?></td>
						<td><input type="text" class="text number administrative_fields" name="smtp_port" value="<?php echo config('smtp_port'); ?>" style="width:40px;"/></td>
					</tr>
				</table>
				<p class="helptext"><?php __('config/helptext_administrative'); ?></p>
			</div>
		</div>
	</div>
</div>