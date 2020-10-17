<?php
include_once("config.php");


//$citynames = "Adambakkam, Adyar, Alandur, Alapakkam, Alwarpet, Alwarthirunagar, Ambattur, Aminjikarai, Anna Nagar, Annanur, Arumbakkam, Ashok Nagar, Avadi, Ayanavaram, Besant Nagar, Basin Bridge, Chepauk, Chetput, chennai central, Chintadripet, Chitlapakkam, Choolai, Choolaimedu, Chrompet, Egmore, Egmore Railway station,  Ekkaduthangal, Eranavur, Ennore, Echankuzhi, Foreshore,  EasteFort,  St. George, George Town, Gopalapuram, Government Estate, Guindy, GerugambakkamIIT, MadrasInjambakkam, ICF, Iyyapanthangal, Jafferkhanpet, Karapakkam, Kattivakkam, Kattupakkam, Kazhipattur, K.K. Nagar, Keelkattalai, Kattivakkam, Kilpauk, Kodambakkam, Kodungaiyur, Kolathur, Korattur, Korukkupet, Kottivakkam, Kalakkral, Kotturpuram, Kottur, Kovilambakkam, Koyambedu, Kundrathur, Madhavaram, Madhavaram Milk Colony, Madipakkam, Madambakkam, Maduravoyal, Manali, Manali New Town, Manapakkam, Mandaveli, Mangadu, Mannady, Mathur, Medavakkam, Meenambakkam, MGR NagarMinjurMogappairMKB Nagar, Mount Road, Moolakadai, Moulivakkam, Mugalivakkam, merina beach, Mudichur, Mylapore, Nandanam, Nanganallur, Nanmangalam, Neelankarai, Nemilichery, Nesapakkam, Nolambur, Noombal, Nungambakkam, Otteri, PadiPakkam, Palavakkam, Pallavaram, Pallikaranai, Pammal, Park Town, Parry's Corner, Pattabiram, Pattaravakkam, Pazhavanthangal, Peerkankaranai, Perambur, Peravallur, Perumbakkam, Perungalathur, Perungudi, Pozhichalur, Poonamallee, Porur, Pudupet, Pulianthope, Purasaiwalkam, Puthagaram, Puzhal, Pudhunaappaalayam, Puzhuthivakkam,  Ullagaram, Raj Bhavan, Ramavaram, Red Hills, Royapettah, Royapuram, Saidapet, Saligramam, Santhome, Sembakkam, Selaiyur, Shenoy Nagar, Sholavaram, Sholinganallur, Sithalapakkam, Sowcarpet, St.Thomas Mount, Tambaram, Teynampet, Tharamani, T. Nagar, Thirumangalam, Thirumullaivoyal, Thiruneermalai, Thiruninravur, Thiruvanmiyur, Tiruverkadu, Thiruvotriyur, Thuraipakkam, Tirusulam, Tiruvallikeni, Tondiarpet, United India Colony, Vandalur, Vadapalani, Valasaravakkam, Vallalar Nagar, Vanagaram, Velachery, Villivakkam, valluvarkottam, Virugambakkam, Vyasarpadi, Washermanpet, West, Mambalam";
//$citynames = "Kadayanallur,Tenkasi,Sankarankovil,Shenkottai,Sivagiri,Veerakeralamputhur,Alangulam,Tiruvengadam";
//$citynames = "Alampalayam,Anupparpalayam,Kadathur,Kanakkampalayam,Kangeyam,Kaniyur,Kannivadi,Kolathupalayam,Kunnathur,Madathukulam,Manickapuram,Mulanur,Muthur,Palladam,Periyapatti,Samalapuram,Sankaramanallur,Semmipalayam,Sukkampalayam,Tiruppur,Udumalaipettai,Uthukuli";
//$citynames = "Bargur,Denkanikottai,Hosur,Kaveripattinam,Kelamangalam,Krishnagiri,Mathigiri,Nagojanahalli,Rayakottai,Samanthamalai,Shoolagiri,Thally,Uthangarai";
//$citynames = "Narsampatti,Natham,Tirupattur,Natrampalli";
//$citynames = "Chinnasalem,Kallakurichi,Manalurpet,Moongilthuraipattu,Rishivandiyam,Sankarapuram,Somandargudi,Thachur,Thiagadurgam,Tirukoilur,Ulundurpettai,Vadakkanandal";
//$citynames = "Ammanambakkam,Anna Nagar,Gokulapuram,JK Nagar,Kalpakkam Junction,Kammalampattu,Mahalakshmi Nagar,Melamaiyur,Non Gazetted Govt Officers Nagar,Pazhaveli,Rajakulipettia,Shanthasaraswathi Nagar,Singaperumal Koil,Thenur,Thirumani,Thirumani Rf,Uthiramerur,Varadharaja Nagar,Vedachalam Nagar";
//$citynames = "ACS Nagar,Adaikala Annai Nagar,Adaimadai Puttur,Ahmed Colony,Akilandeswari Nagar,Alakapuri,Alathur,Ambikapuram,Amman Nagar,Anandam Nagar,Anbudaiyan Colony,Devar Colony,Devathanam,Dhanapal Nagar,Dheeran Nagar,EB Colony,East Agraharam,Edamalaipatti Pudur,Ellakudy,Fathima Nagar,Ganapathi Nagar,Bharathiyar Salai,Bhima Nagar,Burma Colony,Cavery Nagar,Chellayee Colony,Chinthamani Police Colony,Cholan Nagar,Church Colony,Circuit House Colony,Crawford Colony,Nevadanam,Annamalai Nagar,Annanagarpalli,Ayappa Nagar,Ayyan Vaikkal,Balaji Nagar,Balakrishnan Nagar,Bank Staff Colony,Bankers Colony,Bells Railway Colony,Bharathi Nagar,Bharathidasan Nagar,Gandhi Nagar,Gandhi Puram,Ganesh Nagar,Geetha Nagar,Gokul Nagar,Hanifa Colony,Ibrahim Nagar,Indian Bank Colony,lqbal Colony,lyappa Nagar,lyyar Colony,JK Nagar,Jambukeswar Nagar,Jeeva Nagar,John Thoppu,K Sathanur,KK Kottai Village,KK Nagar,KRS Nagar,Kailash Nagar,Kajanagar,Kalkuzhi,Kallangadu,Kamaraj Nagar,Kambarasampettai,Kandhan Nagar,Kanna Annai Nagar,Karumandapam,Kattur,Kaveri,Kaveri Nagar,Keshav Nagar,Khajamalal Colony,Lingam Nagar,Lourdh Swamy Colony,MG Gate,MGS Colony,MK Kottai,MM Nagar,Madavarperumalkovil,Mahalakshmi nagar,Maharishi Vedathri Nagar,Malayappa Nagar,Mallachchipuram,Mallchindamani,Mangamma Nagar,Mannarpuram,Maruthi Nagar,Mela Kalkandar Kottai,Melapudur,Menaka Nagar,Military Colony,Palani Nagar,Pappakurichi Village,Pichandarkovil,Police Quarter,Pon Nagar,Priyanka Nagar,Mottai Kopuram,NMK Colony,Nachikurichi,Nochiyam,Omsakthi Nagar,Palakkarai,Puthur,RMS Colony,RS Puram,Ragavendrapuram,Rail Vihar,Railway Colony,Raja Colony,Rajappa Nagar,Rajiv Gandhi Nagar,Senthaneerpuram,Shakti Nagar,Shanmuga Nagar,Shashesayee Nager,Sholanganallur,Singarattoppu,Sivaram Nagar,Sri Ram Nagar,Srinivasa Nagar,Srirangam,St Joseph Staff Colony,Stalin Nagar,Rama Krishna Nagar,Ramachandra Nagar,Ramalinga Nagar,Rathna puram,Renga nagar,Rock Fort Nagar,SBI Colony,SM Nagar,SMESC Colony,SR Nagar Colony,Subramaniyapuram,Sundar Nagar,Sundararaj Nagar,Teppakulam,Thalakkudi,Thuraiyur,Thillai Nagar,Thirunagar,Thiruvalluvar Avenue,Trichy Arivalayam,Trichy Central ,Uaayankondam Thirumalai,Uthamarkoil,Washermenpet,Weavers Colony,West Ambika Puram,West Rajappa Nagar,West Washermenpet,Woraiyur,Yogham Nagar";
//$citynames = "Achampattu,Alagar Nagar,Alagu Sundaram Nagar,Alangulam,Alwarpuram,Anaikkal,Anaiyur,Andalpuram,Anjal Nagar,Anna Nagar,Ansari Nagar,Anuppandi,Arapalayam,Arasaridi,Arignar Anna Nagar,Chokkikulam,DSP Nagar,Distric Court Area,Durai Samy Nagar,EB Colony,ESI Nagar,Ellis Nagar,Ezhil Nagar,Fatima Nagar,Fenner Rubber Factory Kochadai,Central Warehouse,Chandragandhi Nagar,Chellaiya Nagar,Chembaruthi Nagar,Chidambaram Nagar,Chinna Chokkikkulam,Chintamani,Chokkalinga Nagar,Ashok Nagar,Ayyanarpuram,Babu nagar,Bama Nagar,Bank Colony,Ganapathy Nagar,Gandhipuram,Ghandhi Nagar,Gomathipuram,Goripalayam,HMS Colony,Hanumanpatti,IT Quarters,Indira Gandhi Nagar,Industrial Colony,Industrial Estate,Jaihindpuram,Jail Colony,KK Nagar,Koodal Nagar,Kovlam Nagar,Kulamangalam,LIC Colony,Narimedu,Maattuthavani bus stand,Municipal Colony,Meenakshi Amman Temple,Madurai Railway Station,Park Town,Pandiyan Nagar,Senapati Nagar,Shanthi Nagar,Sattamanglam Housing Board Colony,Railar Nagar,Railway Colony,Sri Ram Nagar,West Ponnagram,Vandiyur Junction,Valluvar Colony,Umachikulam,Subramanyapuram,Sundararajapuram,Swami Vivekananda Nagar,TNHB Colony,TPM Nagar,TVS Nagar,Tallakulam";
$citynames = "Nithravilai";

foreach(explode(",",$citynames) as $cn) {
    $mysql->insert("_jcitynames",array("countryid"      => "1",
                                               "countryname"    => "India",
                                               "stateid"        => "31",
                                               "statename"      => "TamilNadu",
                                               "distcid"        => "75",
                                               "districtname"   => "Kanyakumari",
                                               "cityname"       => trim($cn)));
}
echo $citynames;
//  5161 +  165  + 8 + 22  + 13 + 4  + 12  + 19  + 80 + 158 + 1
exit;



                                     





$data = $mysql->select("select * from _jcitynames where distcid='0'");
//$data = $mysql->select("select * from _jcitynames where districtid=0 and statenameid=31 order by districtname  ");
echo sizeof($data);
 
foreach($data as $d) {
  //  echo "<br>".$d['statenameid'].":::::".$d['statename'].":::::".$d['districtname'];
     $dist = $mysql->select("select * from _jdistrictnames where stateid='".$d['stateid']."' and districtname='". $d['districtname']."'");
     if (sizeof($dist)>0) {
         $mysql->execute("update _jcitynames set distcid='".$dist[0]['distcid']."' where citynameid='".$d['citynameid']."'");
         echo "<br>updated City ".$d['citynameid'];
     }
}
 //select * from _jdistrictnames where stateid='15' order by districtname
 //select * from _jcitynames where districtid=0 and statenameid=15 order by districtname            

?> 