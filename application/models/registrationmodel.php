<?php

class Registrationmodel extends CI_Model 
{
	function checkActive($username)
	{
		$this->db->select("*");
		$this->db->from("user_master");
		$this->db->where("email",$username);
		$query 	=	$this->db->get();
		$row 	=	$query->row();
		$noRows =	$query->num_rows();
		if($noRows >0 )
		{
			if($row->is_confirmed==0)
			{
				return false;
			} else {
				return true;
			} 
		} else{
			return true;
		}
		
	}

	function emailNotExist($emailId)
	{
		$this->db->select("*");
		$this->db->from("user_master");
		$this->db->where("email",$emailId);
		$query 	=	$this->db->get();
		$row 	=	$query->row();
		$noRows =	$query->num_rows();
		if($noRows >0 )
		{
			return false;
		} else{
			return true;
		}
	}

	function getCountryList($selId)
	{
		$output 		=	"<option value=''>--Choose--</option>";
		$countryArray 	=	array(
		"Afghanistan" => "Afghanistan"
		,"Albania" => "Albania"
		,"Algeria" => "Algeria"
		,"American Samoa" => "American Samoa"
		,"Andorra" => "Andorra"
		,"Angola" => "Angola"
		,"Anguilla" => "Anguilla"
		,"Antarctica" => "Antarctica"
		,"Antigua and Barbuda" => "Antigua and Barbuda"
		,"Argentina" => "Argentina"
		,"Armenia" => "Armenia"
		,"Aruba" => "Aruba"
		,"Australia" => "Australia"
		,"Austria" => "Austria"
		,"Azerbaijan" => "Azerbaijan"
		,"Bahamas" => "Bahamas"
		,"Bahrain" => "Bahrain"
		,"Bangladesh" => "Bangladesh"
		,"Barbados" => "Barbados"
		,"Belarus" => "Belarus"
		,"Belgium" => "Belgium"
		,"Belize" => "Belize"
		,"Benin" => "Benin"
		,"Bermuda" => "Bermuda"
		,"Bhutan" => "Bhutan"
		,"Bolivia" => "Bolivia"
		,"Bosnia and Herzegovina" => "Bosnia and Herzegovina"
		,"Botswana" => "Botswana"
		,"Bouvet Island" => "Bouvet Island"
		,"Brazil" => "Brazil"
		,"British Indian Ocean Territory" => "British Indian Ocean Territory"
		,"Brunei Darussalam" => "Brunei Darussalam"
		,"Bulgaria" => "Bulgaria"
		,"Burkina Faso" => "Burkina Faso"
		,"Burundi" => "Burundi"
		,"Cambodia" => "Cambodia"
		,"Cameroon" => "Cameroon"
		,"Canada" => "Canada"
		,"Canadian Nunavut Territory" => "Canadian Nunavut Territory"
		,"Cape Verde" => "Cape Verde"
		,"Cayman Islands" => "Cayman Islands"
		,"Central African Republic" => "Central African Republic"
		,"Chad" => "Chad"
		,"Chile" => "Chile"
		,"China" => "China"
		,"Christmas Island" => "Christmas Island"
		,"Cocos (Keeling Islands)" => "Cocos (Keeling Islands)"
		,"Colombia" => "Colombia"
		,"Comoros" => "Comoros"
		,"Congo" => "Congo"
		,"Cook Islands" => "Cook Islands"
		,"Costa Rica" => "Costa Rica"
		,"Cote DIvoire (Ivory Coast)" => "Cote DIvoire (Ivory Coast)"
		,"Croatia (Hrvatska)" => "Croatia (Hrvatska)"
		,"Cuba" => "Cuba"
		,"Cyprus" => "Cyprus"
		,"Czech Republic" => "Czech Republic"
		,"Denmark" => "Denmark"
		,"Djibouti" => "Djibouti"
		,"Dominica" => "Dominica"
		,"Dominican Republic" => "Dominican Republic"
		,"East Timor" => "East Timor"
		,"Ecuador" => "Ecuador"
		,"Egypt" => "Egypt"
		,"El Salvador" => "El Salvador"
		,"Equatorial Guinea" => "Equatorial Guinea"
		,"Eritrea" => "Eritrea"
		,"Estonia" => "Estonia"
		,"Ethiopia" => "Ethiopia"
		,"Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)"
		,"Faroe Islands" => "Faroe Islands"
		,"Fiji" => "Fiji"
		,"Finland" => "Finland"
		,"France" => "France"
		,"France, Metropolitan" => "France, Metropolitan"
		,"French Guiana" => "French Guiana"
		,"French Polynesia" => "French Polynesia"
		,"French Southern Territories" => "French Southern Territories"
		,"Gabon" => "Gabon"
		,"Gambia" => "Gambia"
		,"Georgia" => "Georgia"
		,"Germany" => "Germany"
		,"Ghana" => "Ghana"
		,"Gibraltar" => "Gibraltar"
		,"Greece" => "Greece"
		,"Greenland" => "Greenland"
		,"Grenada" => "Grenada"
		,"Guadeloupe" => "Guadeloupe"
		,"Guam" => "Guam"
		,"Guatemala" => "Guatemala"
		,"Guinea" => "Guinea"
		,"Guinea-Bissau" => "Guinea-Bissau"
		,"Guyana" => "Guyana"
		,"Haiti" => "Haiti"
		,"Heard and McDonald Islands" => "Heard and McDonald Islands"
		,"Honduras" => "Honduras"
		,"Hong Kong" => "Hong Kong"
		,"Hungary" => "Hungary"
		,"Iceland" => "Iceland"
		,"India" => "India"
		,"Indonesia" => "Indonesia"
		,"Iran" => "Iran"
		,"Iraq" => "Iraq"
		,"Ireland" => "Ireland"
		,"Israel" => "Israel"
		,"Italy" => "Italy"
		,"Jamaica" => "Jamaica"
		,"Japan" => "Japan"
		,"Jordan" => "Jordan"
		,"Kazakhstan" => "Kazakhstan"
		,"Kenya" => "Kenya"
		,"Kiribati" => "Kiribati"
		,"Korea (North)" => "Korea (North)"
		,"Korea (South)" => "Korea (South)"
		,"Kuwait" => "Kuwait"
		,"Kyrgyzstan" => "Kyrgyzstan"
		,"Laos" => "Laos"
		,"Latvia" => "Latvia"
		,"Lebanon" => "Lebanon"
		,"Lesotho" => "Lesotho"
		,"Liberia" => "Liberia"
		,"Libya" => "Libya"
		,"Liechtenstein" => "Liechtenstein"
		,"Lithuania" => "Lithuania"
		,"Luxembourg" => "Luxembourg"
		,"Macau" => "Macau"
		,"Macedonia" => "Macedonia"
		,"Madagascar" => "Madagascar"
		,"Malawi" => "Malawi"
		,"Malaysia" => "Malaysia"
		,"Maldives" => "Maldives"
		,"Mali" => "Mali"
		,"Malta<" => "Malta"
		,"Marshall Islands" => "Marshall Islands"
		,"Martinique" => "Martinique"
		,"Mauritania" => "Mauritania"
		,"Mauritius" => "Mauritius"
		,"Mayotte" => "Mayotte"
		,"Mexico" => "Mexico"
		,"Micronesia" => "Micronesia"
		,"Moldova" => "Moldova"
		,"Monaco" => "Monaco"
		,"Mongolia" => "Mongolia"
		,"Montserrat" => "Montserrat"
		,"Morocco" => "Morocco"
		,"Mozambique" => "Mozambique"
		,"Myanmar" => "Myanmar"
		,"Namibia" => "Namibia"
		,"Nauru" => "Nauru"
		,"Nepal" => "Nepal"
		,"Netherlands" => "Netherlands"
		,"Netherlands Antilles" => "Netherlands Antilles"
		,"New Caledonia" => "New Caledonia"
		,"New Zealand" => "New Zealand"
		,"Nicaragua" => "Nicaragua"
		,"Niger" => "Niger"
		,"Nigeria" => "Nigeria"
		,"Niue" => "Niue"
		,"Norfolk Island" => "Norfolk Island"
		,"Northern Mariana Islands" => "Northern Mariana Islands"
		,"Norway" => "Norway"
		,"Oman" => "Oman"
		,"Pakistan" => "Pakistan"
		,"Palau" => "Palau"
		,"Palestine" => "Palestine"
		,"Panama" => "Panama"
		,"Papua New Guinea" => "Papua New Guinea"
		,"Paraguay" => "Paraguay"
		,"Peru" => "Peru"
		,"Philippines" => "Philippines"
		,"Pitcairn" => "Pitcairn"
		,"Poland" => "Poland"
		,"Portugal" => "Portugal"
		,"Qatar" => "Qatar"
		,"Reunion" => "Reunion"
		,"Romania" => "Romania"
		,"Russian Federation" => "Russian Federation"
		,"Rwanda" => "Rwanda"
		,"S. Georgia and S. Sandwich Isls." => "S. Georgia and S. Sandwich Isls."
		,"Saint Kitts and Nevis" => "Saint Kitts and Nevis"
		,"Saint Lucia" => "Saint Lucia"
		,"Saint Vincent and The Grenadines" => "Saint Vincent and The Grenadines"
		,"Samoa" => "Samoa"
		,"San Marino" => "San Marino"
		,"Sao Tome and Principe" => "Sao Tome and Principe"
		,"Saudi Arabia" => "Saudi Arabia"
		,"Senegal" => "Senegal"
		,"Serbia" => "Serbia"
		,"Seychelles" => "Seychelles"
		,"Sierra Leone" => "Sierra Leone"
		,"Singapore" => "Singapore"
		,"Slovak Republic" => "Slovak Republic"
		,"Slovenia" => "Slovenia"
		,"Solomon Islands" => "Solomon Islands"
		,"Somalia" => "Somalia"
		,"South Africa" => "South Africa"
		,"Spain" => "Spain"
		,"Sri Lanka" => "Sri Lanka"
		,"St. Helena" => "St. Helena"
		,"St. Pierre and Miquelon" => "St. Pierre and Miquelon"
		,"Sudan" => "Sudan"
		,"Suriname" => "Suriname"
		,"Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands"
		,"Swaziland" => "Swaziland"
		,"Sweden" => "Sweden"
		,"Switzerland" => "Switzerland"
		,"Syria" => "Syria"
		,"Taiwan" => "Taiwan"
		,"Tajikistan" => "Tajikistan"
		,"Tanzania" => "Tanzania"
		,"Thailand" => "Thailand"
		,"Togo" => "Togo"
		,"Tokelau" => "Tokelau"
		,"Tonga" => "Tonga"
		,"Trinidad and Tobago" => "Trinidad and Tobago"
		,"Tunisia" => "Tunisia"
		,"Turkey" => "Turkey"
		,"Turkmenistan" => "Turkmenistan"
		,"Turks and Caicos Islands" => "Turks and Caicos Islands"
		,"Tuvalu" => "Tuvalu"
		,"United States" => "United States"
		,"US Minor Outlying Islands" => "US Minor Outlying Islands"
		,"Uganda" => "Uganda"
		,"Ukraine" => "Ukraine"
		,"United Kingdom" => "United Kingdom"
		,"United Arab Emirates" => "United Arab Emirates"
		,"Uruguay" => "Uruguay"
		,"Uzbekistan" => "Uzbekistan"
		,"Vanuatu" => "Vanuatu"
		,"Vatican City State (Holy See)" => "Vatican City State (Holy See)"
		,"Venezuela" => "Venezuela"
		,"Viet Nam" => "Viet Nam"
		,"Virgin Islands (British)" => "Virgin Islands (British)"
		,"Wallis and Futuna Islands" => "Wallis and Futuna Islands"
		,"Western Sahara" => "Western Sahara"
		,"Yemen" => "Yemen"
		,"Yugoslavia" => "Yugoslavia"
		,"Zaire" => "Zaire"
		,"Zambia" => "Zambia"
		,"Zimbabwe" => "Zimbabwe");
		foreach ($countryArray as $key => $value) {
			if($selId==$key)
			{
				$sel 	=	"selected='selected'";
			} else {
				$sel 	=	"";
			}
			$output 	.=	"<option ".$sel." value='".$key."'>".$value."</option>";
		}
		return $output;
	}
}