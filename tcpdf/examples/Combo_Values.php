<?php

//Dropdown Menu for Month
	$month_arr = array("January"=>"January","February"=>"February","March"=>"March","April"=>"April","May"=>"May","June"=>"June","July"=>"July","August"=>"August","September"=>"September","October"=>"October","November"=>"November","December"=>"December");


    function showMonthOptionsDrop($array, $active, $echo=true)
	{
	  $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
	   
	   //Dropdown Menu for Month
	$count_arr = array("None"=>"None","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10","11"=>"11","12"=>"12","13"=>"13","14"=>"14","15"=>"15","16"=>"16","17"=>"17","18"=>"18","19"=>"19","20"=>"20","21"=>"21","22"=>"22","23"=>"23","24"=>"24","25"=>"25","26"=>"26","27"=>"27","28"=>"28","29"=>"29","30"=>"30");
    function showCountOptionsDrop($array, $active, $echo=true)
	{
	  $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }

	   	//Dropdown Menu for Country
		 
	 $country_arr = array("United States"=>"United States","Afghanistan"=>"Afghanistan","Albania"=>"Albania", "Algeria"=>"Algeria","American Samoa"=>"American Samoa","Andorra"=>"Andorra","Angola"=>"Angola","Anguilla"=>"Anguilla","Antarctica"=>"Antarctica","Antigua and Barbuda"=>"Antigua and Barbuda","Argentina"=>"Argentina","Armenia"=>"Armenia","Aruba"=>"Aruba","Australia"=>"Australia","Austria"=>"Austria","Azerbaijan"=>"Azerbaijan","Bahamas"=>"Bahamas","Bahrain"=>"Bahrain","Bangladesh"=>"Bangladesh","Barbados"=>"Barbados","Belarus"=>"Belarus","Belgium"=>"Belgium","Belize"=>"Belize","Benin"=>"Benin","Bermuda"=>"Bermuda","Bhutan"=>"Bhutan","Bolivia"=>"Bolivia","Bosnia and Herzegovina"=>"Bosnia and Herzegovina","Botswana"=>"Botswana","Bouvet Island"=>"Bouvet Island","Brazil"=>"Brazil","British Indian Ocean Territory"=>"British Indian Ocean Territory","Brunei Darussalam"=>"Brunei Darussalam","Bulgaria"=>"Bulgaria","Burkina Faso"=>"Burkina Faso","Burundi"=>"Burundi","Cambodia"=>"Cambodia","Cameroon"=>"Cameroon","Canada"=>"Canada","Cape Verde"=>"Cape Verde","Cayman Islands"=>"Cayman Islands","Central African Republic"=>"Central African Republic","Chad"=>"Chad","Chile"=>"Chile","China"=>"China","Christmas Island"=>"Christmas Island","Cocos (Keeling) Islands"=>"Cocos (Keeling) Islands","Colombia"=>"Colombia","Comoros"=>"Comoros","Congo"=>"Congo","Congo, the Democratic Republic of the"=>"Congo, the Democratic Republic of the","Cook Islands"=>"Cook Islands","Costa Rica"=>"Costa Rica","Cote DIvoire"=>"Cote DIvoire","Croatia"=>"Croatia","Cuba"=>"Cuba","Cyprus"=>"Cyprus","Czech Republic"=>"Czech Republic","Denmark"=>"Denmark","Djibouti"=>"Djibouti","Dominica"=>"Dominica","Dominican Republic"=>"Dominican Republic","Ecuador"=>"Ecuador","Egypt"=>"Egypt","El Salvador"=>"El Salvador","Equatorial Guinea"=>"Equatorial Guinea","Eritrea"=>"Eritrea","Estonia"=>"Estonia","Ethiopia"=>"Ethiopia","Falkland Islands (Malvinas)"=>"Falkland Islands (Malvinas)","Faroe Islands"=>"Faroe Islands","Fiji"=>"Fiji","Finland"=>"Finland","France"=>"France","French Guiana"=>"French Guiana","French Polynesia"=>"French Polynesia","French Southern Territories"=>"French Southern Territories","Gabon"=>"Gabon","Gambia"=>"Gambia","Georgia"=>"Georgia","Germany"=>"Germany","Ghana"=>"Ghana","Gibraltar"=>"Gibraltar","Greece"=>"Greece","Greenland"=>"Greenland","Grenada"=>"Grenada","Guadeloupe"=>"Guadeloupe","Guam"=>"Guam","Guatemala"=>"Guatemala","Guinea"=>"Guinea","Guinea-Bissau"=>"Guinea-Bissau","Guyana"=>"Guyana","Haiti"=>"Haiti","Heard Island and Mcdonald Islands"=>"Heard Island and Mcdonald Islands","Holy See (Vatican City State)"=>"Holy See (Vatican City State)","Honduras"=>"Honduras","Hong Kong"=>"Hong Kong","Hungary"=>"Hungary","Iceland"=>"Iceland","India"=>"India","Indonesia"=>"Indonesia","Iran, Islamic Republic of"=>"Iran, Islamic Republic of","Iraq"=>"Iraq","Ireland"=>"Ireland","Israel"=>"Israel","Italy"=>"Italy","Jamaica"=>"Jamaica","Japan"=>"Japan","Jordan"=>"Jordan","Kazakhstan"=>"Kazakhstan","Kenya"=>"Kenya","Kiribati"=>"Kiribati","Korea, Democratic People Republic of"=>"Korea, Democratic People Republic of","Korea, Republic of"=>"Korea, Republic of","Kuwait"=>"Kuwait","Kyrgyzstan"=>"Kyrgyzstan","Lao People Democratic Republic"=>"Lao People Democratic Republic","Latvia"=>"Latvia","Lebanon"=>"Lebanon","Lesotho"=>"Lesotho","Liberia"=>"Liberia","Libyan Arab Jamahiriya"=>"Libyan Arab Jamahiriya","Liechtenstein"=>"Liechtenstein","Lithuania"=>"Lithuania","Luxembourg"=>"Luxembourg","Macao"=>"Macao","Macedonia, the Former Yugoslav Republic of"=>"Macedonia, the Former Yugoslav Republic of","Madagascar"=>"Madagascar","Malawi"=>"Malawi","Malaysia"=>"Malaysia","Maldives"=>"Maldives","Mali"=>"Mali","Malta"=>"Malta","Marshall Islands"=>"Marshall Islands","Martinique"=>"Martinique","Mauritania"=>"Mauritania","Mauritius"=>"Mauritius","Mayotte"=>"Mayotte","Mexico"=>"Mexico","Micronesia, Federated States of"=>"Micronesia, Federated States of","Moldova, Republic of"=>"Moldova, Republic of","Monaco"=>"Monaco","Mongolia"=>"Mongolia","Montserrat"=>"Montserrat","Morocco"=>"Morocco","Mozambique"=>"Mozambique","Myanmar"=>"Myanmar","Namibia"=>"Namibia","Nauru"=>"Nauru","Nepal"=>"Nepal","Netherlands"=>"Netherlands","Netherlands Antilles"=>"Netherlands Antilles","New Caledonia"=>"New Caledonia","New Zealand"=>"New Zealand","Nicaragua"=>"Nicaragua","Niger"=>"Niger","Nigeria"=>"Nigeria","Niue"=>"Niue","Norfolk Island"=>"Norfolk Island","Northern Mariana Islands"=>"Northern Mariana Islands","Norway"=>"Norway","Oman"=>"Oman","Pakistan"=>"Pakistan","Palau"=>"Palau","Palestinian Territory, Occupied"=>"Palestinian Territory, Occupied","Panama"=>"Panama","Papua New Guinea"=>"Papua New Guinea","Paraguay"=>"Paraguay","Peru"=>"Peru","Philippines"=>"Philippines","Pitcairn"=>"Pitcairn","Poland"=>"Poland","Portugal"=>"Portugal","Puerto Rico"=>"Puerto Rico","Qatar"=>"Qatar","Reunion"=>"Reunion","Romania"=>"Romania","Russian Federation"=>"Russian Federation","Rwanda"=>"Rwanda","Saint Helena"=>"Saint Helena","Saint Kitts and Nevis"=>"Saint Kitts and Nevis","Saint Lucia"=>"Saint Lucia","Saint Pierre and Miquelon"=>"Saint Pierre and Miquelon","Saint Vincent and the Grenadines"=>"Saint Vincent and the Grenadines","Samoa"=>"Samoa","San Marino"=>"San Marino","Sao Tome and Principe"=>"Sao Tome and Principe","Saudi Arabia"=>"Saudi Arabia","Senegal"=>"Senegal","Serbia and Montenegro"=>"Serbia and Montenegro","Seychelles"=>"Seychelles","Sierra Leone"=>"Sierra Leone","Singapore"=>"Singapore","Slovakia"=>"Slovakia","Slovenia"=>"Slovenia","Solomon Islands"=>"Solomon Islands","Somalia"=>"Somalia","South Africa"=>"South Africa","South Georgia and the South Sandwich Islands"=>"South Georgia and the South Sandwich Islands","Spain"=>"Spain","Sri Lanka"=>"Sri Lanka","Sudan"=>"Sudan","Suriname"=>"Suriname","Svalbard and Jan Mayen"=>"Svalbard and Jan Mayen","Swaziland"=>"Swaziland","Sweden"=>"Sweden","Switzerland"=>"Switzerland","Syrian Arab Republic"=>"Syrian Arab Republic","Taiwan, Province of China"=>"Taiwan, Province of China","Tajikistan"=>"Tajikistan","Tanzania, United Republic of"=>"Tanzania, United Republic of","Thailand"=>"Thailand","Timor-Leste"=>"Timor-Leste","Togo"=>"Togo","Tokelau"=>"Tokelau","Tonga"=>"Tonga","Trinidad and Tobago"=>"Trinidad and Tobago","Tunisia"=>"Tunisia","Turkey"=>"Turkey","Turkmenistan"=>"Turkmenistan","Turks and Caicos Islands"=>"Turks and Caicos Islands","Tuvalu"=>"Tuvalu","Uganda"=>"Uganda","Ukraine"=>"Ukraine","United Arab Emirates"=>"United Arab Emirates","United Kingdom"=>"United Kingdom","United States Minor Outlying Islands"=>"United States Minor Outlying Islands","Uruguay"=>"Uruguay","Uzbekistan"=>"Uzbekistan","Vanuatu"=>"Vanuatu","Venezuela"=>"Venezuela","Viet Nam"=>"Viet Nam","Virgin Islands, British"=>"Virgin Islands, British","Virgin Islands, US"=>"Virgin Islands, US","Wallis and Futuna"=>"Wallis and Futuna","Western Sahara"=>"Western Sahara","Yemen"=>"Yemen","Zambia"=>"Zambia","Zimbabwe"=>"Zimbabwe");

    function showCountryOptionsDrop($array, $active, $echo=true)
	{
	  	 $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }

	
	
	//Dropdown Menu for State
	$states_arr = array("Other"=>"Other","Alabama"=>"Alabama","Alaska"=>"Alaska","Arizona"=>"Arizona","Arkansas"=>"Arkansas","California"=>"California","Colorado"=>"Colorado","Connecticut"=>"Connecticut","Delaware"=>"Delaware","District Of Columbia"=>"District Of Columbia","Florida"=>"Florida","Georgia"=>"Georgia","Hawaii"=>"Hawaii","Idaho"=>"Idaho","Illinois"=>"Illinois", "Indiana"=>"Indiana", "Iowa"=>"Iowa",  "Kansas"=>"Kansas","Kentucky"=>"Kentucky","Louisiana"=>"Louisiana","Maine"=>"Maine","Maryland"=>"Maryland", "Massachusetts"=>"Massachusetts","Michigan"=>"Michigan","Minnesota"=>"Minnesota","Mississippi"=>"Mississippi","Missouri"=>"Missouri","Montana"=>"Montana","Nebraska"=>"Nebraska","Nevada"=>"Nevada","New Hampshire"=>"New Hampshire","New Jersey"=>"New Jersey","New Mexico"=>"New Mexico","New York"=>"New York","North Carolina"=>"North Carolina","North Dakota"=>"North Dakota","Ohio"=>"Ohio","Oklahoma"=>"Oklahoma", "Oregon"=>"Oregon","Pennsylvania"=>"Pennsylvania","Rhode Island"=>"Rhode Island","South Carolina"=>"South Carolina","South Dakota"=>"South Dakota","Tennessee"=>"Tennessee","Texas"=>"Texas","Utah"=>"Utah","Vermont"=>"Vermont","Virginia"=>"Virginia","WA"=>"Washington","West Virginia"=>"West Virginia","Wisconsin"=>"Wisconsin","Wyoming"=>"Wyoming");

    function showStateOptionsDrop($array, $active, $echo=true)
	{
	  	 $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }

	   
	   
	   
                          
//Dropdown Menu for Ethnicity
	$ethnicity_arr = array("Mixed Race"=>"Mixed Race","Arctic"=>"Arctic","Caucasian (European)"=>"Caucasian (European)","Caucasian (Indian)"=>"Caucasian (Indian)","Caucasian (Middle East)"=>"Caucasian (Middle East)","Caucasian (North African)"=>"Caucasian (North African)","Indigenous Australian"=>"Indigenous Australian","Native American"=>"Native American","North East Asian"=>"North East Asian","Pacific"=>"Pacific","South East Asian"=>"South East Asian","West African"=>"West African","Other Race"=>"Other Race");
    function showEthnicityOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
	   
//Dropdown Menu for Education Degree  
	$degree_arr = array("Associate Degree"=>"Associate Degree","Bachelors Degree"=>"Bachelors Degree","Doctorate"=>"Doctorate","High School"=>"High School","Law Degree"=>"Law Degree","Masters Degree"=>"Masters Degree","MBA"=>"MBA","MD"=>"MD","Military Service"=>"Military Service","Other"=>"Other","Post Doctorate"=>"Post Doctorate","Specialist Degree"=>"Specialist Degree","Vocational School"=>"Vocational School");
    
	function showDegreeOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
//Dropdown Menu for Contact Preference
     $contactPref_arr = array("Mail"=>"Mail","Email"=>"Email","Phone"=>"Phone");
	   
	   function showContactPreferenceOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
//Dropdown Menu for Gender Preference
	    $gender_arr = array("Male"=>"Male","Female"=>"Female");
	   
	   function showGenderOptionsDrop($array, $active, $echo=true)
	{
	  $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
//Dropdown Menu for Blood Group

	    $blood_arr = array("A Positive"=>"A Positive","A Negative"=>"A Negative","A Unknown"=>"A Unknown","B Positive"=>"B Positive","B Negative"=>"B Negative","B Unknown"=>"B Unknown","AB Positive"=>"AB Positive","AB Negative"=>"AB Negative","AB Unknown"=>"AB Unknown","O Positive"=>"O Positive","O Negative"=>"O Negative","O Unknown"=>"O Unknown","Unknown"=>"Unknown");
	   
	   function showBloodOptionsDrop($array, $active, $echo=true)
	{
	  $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
	   
//Dropdown Menu for Company type

	    $CompanyName_arr = array("Employer"=>"Employer","Recruitment Agency"=>"Recruitment Agency");
	   
	   function showCompanyName_arrOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
   
   
   //Dropdown Menu for Travel Percentage:

	    $travel_arr = array("10"=>"10","20"=>"20","50"=>"50","75"=>"75","100"=>"100");
	   
	   function showTravelOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
	//Dropdown Menu for Salary Range:

	    $salary_arr = array("$10,000 - $30,000"=>"$10,000 - $30,000","$30,000 - $50,000"=>"$30,000 - $50,000","$50,000 - $80,000"=>"$50,000 - $80,000","$80,000 - $100,000"=>"$80,000 - $100,000","$100,000+"=>"$100,000+");
	   
	   function showSalaryOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
	   
	   //Dropdown Menu for Functional Area:

	    $functional_arr = array("Accounts, Finance, Tax, CS, Audit"=>"Accounts, Finance, Tax, CS, Audit","Application Programming, Maintenance"=>"Application Programming, Maintenance","Architecture, Interior Design"=>"Architecture, Interior Design","Banking, Insurance"=>"Banking, Insurance","Client Server"=>"Client Server","Content, Journalism"=>"Content, Journalism","Corporate Planning, Consulting"=>"Corporate Planning, Consulting","DBA, Datawarehousing"=>"DBA, Datawarehousing","E-Commerce, Internet Technologies"=>"E-Commerce, Internet Technologies","Embedded/EDA/VLSI/ASIC/Chip Design"=>"Embedded/EDA/VLSI/ASIC/Chip Design","Engineering Design"=>"Engineering Design","ERP, CRM"=>"ERP, CRM","Export, Import, Merchandising"=>"Export, Import, Merchandising","Fashion, Garments, Merchandising"=>"Fashion, Garments, Merchandising","FMCG"=>"FMCG","Freshers, Trainee Jobs"=>"Freshers, Trainee Jobs","Guards, Security Services"=>"Guards, Security Services","Healthcare, Medical"=>"Healthcare, Medical","Hotels, Restaurants"=>"Hotels, Restaurants","HR / Administration, IR"=>"HR / Administration, IR","Iron &amp; Steel"=>"Iron &amp; Steel","ISP"=>"ISP","ITES/BPO/KPO, Customer Service, Ops."=>"ITES/BPO/KPO, Customer Service, Ops.","IT-Support, Telecom, Hardware"=>"IT-Support, Telecom, Hardware","Leather"=>"Leather","Legal"=>"Legal","Mainframe"=>"Mainframe","Marketing, Advertising, MR, PR"=>"Marketing, Advertising, MR, PR","Middleware"=>"Middleware","Network Administration, Security"=>"Network Administration, Security","NGO, Government, Defence Jobs"=>"NGO, Government, Defence Jobs","Oil &amp; Gas"=>"Oil &amp; Gas","Other"=>"Other","Overseas, International Jobs"=>"Overseas, International Jobs","Packaging"=>"Packaging","Pharma, Biotech"=>"Pharma, Biotech","Power"=>"Power","Production, Maintenance, Quality"=>"Production, Maintenance, Quality","Purchase, Logistics, Supply Chain"=>"Purchase, Logistics, Supply Chain","QA &amp; Testing"=>"QA &amp; Testing","Retailing"=>"Retailing","Sales, BD"=>"Sales, BD","Secretary, Front Off, Data Entry"=>"Secretary, Front Off, Data Entry","Self Employed, Consultants"=>"Self Employed, Consultants","Site Engg., Project Management"=>"Site Engg., Project Management","SPA"=>"SPA","System Programming"=>"System Programming","Systems, EDP, MIS"=>"Systems, EDP, MIS","Teaching, Education"=>"Teaching, Education","Telecom Software"=>"Telecom Software","Top Management- IT Jobs"=>"Top Management- IT Jobs","Top Management- Non IT Jobs"=>"Top Management- Non IT Jobs","Travel, Ticketing, Airlines"=>"Travel, Ticketing, Airlines","TV, Films, Production"=>"TV, Films, Production","Web, Graphic Design, Visualiser"=>"Web, Graphic Design, Visualiser");
	   
	   function showFunctionalAreaOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }
	   
	   
	   //Dropdown Menu for Industry:

	    $industry_arr = array("Accounting and Auditing Services"=>"Accounting and Auditing Services","Advertising and PR Services"=>"Advertising and PR Services","Aerospace and Defense"=>"Aerospace and Defense","Agriculture/Forestry/Fishing"=>"Agriculture/Forestry/Fishing","Architectural and Design Services"=>"Architectural and Design Services","Automotive and Parts Mfg"=>"Automotive and Parts Mfg","Automotive Sales and Repair Services"=>"Automotive Sales and Repair Services","Banking"=>"Banking","Biotechnology/Pharmaceuticals"=>"Biotechnology/Pharmaceuticals","Broadcasting, Music, and Film"=>"Broadcasting, Music, and Film","Business Services - Other"=>"Business Services - Other","Chemicals/Petro-Chemicals"=>"Chemicals/Petro-Chemicals","Clothing and Textile Manufacturing"=>"Clothing and Textile Manufacturing","Computer Hardware"=>"Computer Hardware","Computer Software"=>"Computer Software","Computer/IT Services"=>"Computer/IT Services","Construction - Industrial Facilities and Infrastructure"=>"Construction - Industrial Facilities and Infrastructure","Construction - Residential & Commercial/Office"=>"Construction - Residential & Commercial/Office","Consumer Packaged Goods Manufacturing"=>"Consumer Packaged Goods Manufacturing","Education"=>"Education","Electronics, Components, and Semiconductor Mfg"=>"Electronics, Components, and Semiconductor Mfg","Energy and Utilities"=>"Energy and Utilities","Engineering Services"=>"Engineering Services","Entertainment Venues and Theaters"=>"Entertainment Venues and Theaters","Financial Services"=>"Financial Services","Food and Beverage Production"=>"Food and Beverage Production","Government and Military"=>"Government and Military","Healthcare Services"=>"Healthcare Services","Hotels and Lodging"=>"Hotels and Lodging","Insurance"=>"Insurance","Internet Services"=>"Internet Services","Legal Services"=>"Legal Services","Management Consulting Services"=>"Management Consulting Services","Manufacturing - Other"=>"Manufacturing - Other","Marine Mfg & Services"=>"Marine Mfg & Services","Medical Devices and Supplies"=>"Medical Devices and Supplies","Metals and Minerals"=>"Metals and Minerals","Nonprofit Charitable Organizations"=>"Nonprofit Charitable Organizations","Other/Not Classified"=>"Other/Not Classified","Performing and Fine Arts"=>"Performing and Fine Arts","Personal and Household Services"=>"Personal and Household Services","Printing and Publishing"=>"Printing and Publishing","Real Estate/Property Management"=>"Real Estate/Property Management","Rental Services"=>"Rental Services","Restaurant/Food Services"=>"Restaurant/Food Services","Retail"=>"Retail","Security and Surveillance"=>"Security and Surveillance","Sports and Physical Recreation"=>"Sports and Physical Recreation","Staffing/Employment Agencies"=>"Staffing/Employment Agencies","Telecommunications Services"=>"Telecommunications Services","Transport and Storage - Materials"=>"Transport and Storage - Materials","Travel, Transportation and Tourism"=>"Travel, Transportation and Tourism","Waste Management"=>"Waste Management","Wholesale Trade/Import-Export"=>"Wholesale Trade/Import-Export");
	   
	   function showIndustryOptionsDrop($array, $active, $echo=true)
	{
	   $string = '';
             foreach($array as $k => $v)
	    	{
            	$s = ($active == $k)? ' selected="selected"' : '';
                $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
            }

          if($echo)   echo $string;
          else        return $string;
       }

?>


