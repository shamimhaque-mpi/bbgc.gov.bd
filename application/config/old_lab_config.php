<?php

// set site name
$config['site_name']    = 'বঙ্গবন্ধু সরকারি  কলেজ, তারাকান্দা, ময়মনসিংহ';
$config['my_database']  ='wwwbbgcgov_bbgc';


$CI = & get_instance();
$CI->load->model('action');
$CI->load->database('default');
$total_sms = $CI->action->read_sum("recharge_sms","sms");
$config['total_sms'] = ($total_sms[0]->sms == null ? 0 : $total_sms[0]->sms);
// $config['total_sms']    = 15000;

// print
$config['header'] = array(
    'title' => 'বঙ্গবন্ধু সরকারি  কলেজ',
    'place' => 'তারাকান্দা, ময়মনসিংহ'
);

// all month
$config['months'] = array(
    'January', 'February', 'March', 'April',
    'May', 'June', 'July', 'August',
    'September', 'October', 'November', 'December'
);


$config['reportMonths'] = array(
    '1'  => 'July',
    '2'  => 'August',
    '3'  => 'September',
    '4'  => 'October',
    '5'  => 'November',
    '6'  => 'December',
    '7'  => 'January',
    '8'  => 'February',
    '9'  => 'March',
    '10' => 'April',
    '11' => 'May',
    '12' => 'June'
);

$config['month_with_number'] = array(
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
);




// privilege
$config['privilege'] = array('super', 'admin', 'user');

// share price
$config['share_price'] = 20;

$config['teacher_designation']=array(
	'principal' 		=> 'Principal',
	'vice_principal' 	=> 'Vice principal',
	'professor' 		=> 'Professor',
	'assist_professor' 	=> 'Assist Professor',
	'lecturer' 		    => 'Lecturer',
	'demonstrator' 		=> 'Demonstrator'
);


$config['committee_designation']=array(
	'president' 		=> 'President',
	'secretary'		    => 'Secretary',
	'gardian_member'	=> 'Gardian Member',
	'founder_member'	=> 'Founder Mamber',
	'director'		    => 'Director',
	'donor_member' 		=> 'Donor Member',
	'Bidyutsahi_member'	=> 'Bidyutsahi Member',
	'teacher_member'	=> 'Teacher Member'
);

// branch information
$config['branch'] = array(
    'PR1' => 'Principal 1',
    'PR2' => 'Principal 2',
    'AKU' => 'Akua',
    'AL1' => 'Alia Madrasha Sadar 1',
    'AL2' => 'Alia Madrasha Sadar 2',
    'SO1' => 'Somvogong 1',
    'SO2' => 'Somvogong 2',
    'MUK' => 'Muktagacha',
    'KAL' => 'Kalibari',
    'TRI' => 'Trishal',
    'BOG' => 'Bogar Bazar',
    'VAL' => 'Valuka',
    'SEE' => 'Seed Store'
);

// account information
$config['account_type'] = array(
    "GSD"   => "General Savings Daily",
    "GSW"   => "General Savings Weekly",
    "RPS"   => "Ruposhi Pension Screem",
    "ACS"   => "Associate Children Savings",
    "TSM"   => "Term Savings Monthly",
    "TPS"   => "Term Savings Screem",
    "TSPS"  => "Term Savings Pension Screem",
    "TSHP"  => "Term Savings Housing Prokolpo",
    "SES"   => "Security Savings"
);

$config['account_details'] = array(
    "SHARE"		    => array(
        "meaning_en"	=> "Share",
        "meaning_bn"	=> "শেয়ার",
        "nature"	    => "দায়ী",
        "description"	=> "শেয়ার মূলধন",
    ),
    "GSD"   => array(
        "meaning_en"    => "General Savings Daily",
        "meaning_bn"    => "সাধারণ সঞ্চয় দৈনিক",
        "nature"        => "দায়ী",
        "description"   => "সাধারণ সঞ্চয়"
    ),
    "GSW"   => array(
        "meaning_en"    => "General Savings Weekly",
        "meaning_bn"    => "সাধারণ সঞ্চয় সাপ্তাহিক",
        "nature"        => "দায়ী",
        "description"   => "সাধারণ সঞ্চয়"
    ),
    "RPS"   => array(
        "meaning_en"    => "Ruposhi Pension Screem",
        "meaning_bn"    => "আর.পি.এস",
        "nature"        => "দায়ী",
        "description"   => "আর.পি.এস"
    ),
    "ACS"   => array(
        "meaning_en"    => "Associate Children Savings",
        "meaning_bn"    => "সহযোগী শিশু সঞ্চয়",
        "nature"        => "দায়ী",
        "description"   => "সহযোগী শিশু সঞ্চয়"
    ),
    "TSM"   => array(
        "meaning_en"    => "Term Savings Monthly",
        "meaning_bn"    => "মেয়াদী সঞ্চয় মাসিক",
        "nature"        => "দায়ী",
        "description"   => "মেয়াদী সঞ্চয়"
    ),
    "TPS"   => array(
        "meaning_en"    => "Term Savings Screem",
        "meaning_bn"    => "মেয়াদী সঞ্চয় মাসিক",
        "nature"        => "দায়ী",
        "description"   => "মেয়াদী সঞ্চয়"
    ),

    "TSPS"  => "Term Savings Pension Screem",
    "TSHP"  => "Term Savings Housing Prokolpo",

    "SES"   => array(
        "meaning_en"    => "Security Savings",
        "meaning_bn"    => "নিরাপত্তা সঞ্চয়",
        "nature"        => "দায়ী",
        "description"   => "নিরাপত্তা সঞ্চয়"
    )
);

// Transaction Type
$config['transaction_nature'] = array(
    "income"        => "আয়",
    "cost"          => "ব্যায়",
    "property"      => "সম্পদ",
    "responsible"   => "দায়ী"
);

// Transaction Type
$config['designation'] = array(
    "প্রধান নির্বাহী কর্মকর্তা", "পরিচালক", "সহকারী পরিচালক",
    "রিজনাল ম্যানাজার", "অডিট এন্ড একাউন্টস অফিসার", "সেন্ট্রাল ক্যাশ অফিসার",
    "আইটি অফিসার", "ট্রেইনার অফিসার", "সহকারী অডিট অফিসার",
    "সহকারী একাউন্টস অফিসার", "ড্রাইভার", "সেন্টার ম্যানাজার",
    "ক্রেডিট অফিসার", "জুনিয়র ক্রেডিট অফিসার", "জুসিও",
    "পিয়ন", "সিএম", "সিও", "কুক", "সেলসম্যান", "শো-রুম ম্যানাজার", "গার্ড"
);

// transaction nature(cost)
$config['cost'] = array(
	"কার্যভাতা প্রদান", "বেতন ভাতা প্রদান", "পি এফ প্রদান(10%)",
    "গ্র্যাচুইটি প্রদান", "উৎসব বোনাস প্রদান", "অফিস ভাড়া প্রদান",
    "বিদ্যুৎ/গাস/পানি/মম/জেনারেটর", "ষ্টেশনারী ক্রয়", "অফিস ব্যবস্থাপনা ক্রয়",
    "ঋণের মুনাফা মওকুফ", "যাতায়াত (টিএ/ডিএ) পরিবহন", "জ্বালানী (ডিজেল/পেট্রোল/মবিল)",
    "মেয়াদী সঞ্চয় মুনাফা প্রদান", "সাধারণ সঞ্চয় মুনাফা প্রদান", "নিরাপত্তা সঞ্চয় মুনাফা প্রদান",
    "আর পি এস মুনাফা প্রদান", "সহযোগী শিশু মুনাফা প্রদান", "দ্বিগুণ/তিগুণ মেয়াদী মুনাফা প্রদান",
    "জামানতের মুনাফা সঞ্চিতি", "পিএফ মুনাফা সঞ্চিতি", "কর্মী আর পি এস মুনাফা সঞ্চিত",
    "ষ্ট্যাম্প, কার্টিজ, রেভিনিউ ক্রয়", "অতিরিক্ত দায়িত্ব পালন ভাতা", "অন্যান্য ইন্সেন্টিভ প্রদান",
    "ব্যবসায় বিনিয়োগ খরচ", "আপ্যয়ন খরচ", "পত্রিকা/সাময়িকি",
    "আইন পরামর্শ ও সহযোগিতা", "ফটোকপি খরচ", "বিভিন্ন বিশেষ দিবসের চাঁদা প্রদান",
	"সমবায় ব্যাংক ঋণের মুনাফা প্রদান", "ব্যাংক ঋণের মুনাফা প্রদান", "কেন্দ্রিয় ফোরাম ঋণের মুনাফা প্রদান",
	"যন্ত্রাংশ ক্রয়", "ব্যাংক চার্জ প্রদান", "ছাপা খরচ প্রদান",
	"প্রচার/প্রকাশনা/বিঙ্গাপন/সাইনবোর্ড", "আইটি বাবদ খরচ", "শিক্ষা বৃত্তি/বৃক্ষরোপন/কল্যাঃঅনুদান/পাঠাগার উন্নয়ন খরচ",
	"অডিট ফি প্রদান", "সমবায় উ্নয়ন তহবিল খরচ", "সংরক্ষিত তহবিল খরচ",
	"ঋণ এর ঝুঁকি তহবিল সঞ্চিতি", "কৃ-ঋণ খরচ", "অবচয় খরচ",
	"মূলধনী মুনাফা প্রদান", "শেয়ার এর মুনাফা প্রদান", "কার্যভাতা প্রধান",
	"বেতন ভাতা প্রধান", "পি এফ প্রধান (১০%)", "গ্র্যাচুইটি প্রধান",
	"উৎসব বোনাস প্রধান", "অফিস ভাড়া প্রধান", "বিদ্যুৎ/গ্যাস/পানি/মম/জেনারেটর",
	"রিনের মুনাফা মওকুফ", "যাতায়াত(টিএ/ডিএ) পরিবহন", "জ্বালানী(ডিজেল/পেট্রোল/মবিল)",
	"মেয়াদি সঞ্চয় মুনাফা প্রধান", "সাধারণ সঞ্চয় মুনাফা প্রধান", "নিরাপত্তা সঞ্চয় মুনাফা প্রধান",
	"আর পি এস মুনাফা প্রধান", "সহযোগী শিশু মুনাফা প্রধান", "দ্বিগুন/তিনগুন মেয়াদী সঞ্চিতি মুনাফা",
	"কর্মী আর  পি এস মুনাফা সঞ্চিতি", "(ষ্ট্যাম্প/কার্টিজ/রেভিনিউ ক্রয়)", "অতিরিক্ত দায়িত্ব পালন ভাতা",
	"অন্যান্য ইন্সেন্টিব প্রধান", "ব্যবসায় বিনিয়োগ খরচ", "আপ্যায়ন খরচ",
	"পত্রিকা/সাময়িকি", "আইন পরামর্শ ও সহযোগীতা", "বিভিন্ন বিশেষ দিবসের চাঁদা প্রধান",
	"মোবাইল বিল", "সমবায় ব্যাংক রিনের মুনাফা প্রধান", "কেন্দ্রিয় ফোরাম রিনের মুনাফা",
	"পরিদর্শন ভাতা", "মেরামত খরচ", "ক্রোকারিজ ক্রয়",
	"যন্ত্রাংশ ক্রয়", "ব্যাংক চার্জ প্রধান", "ছাপা খরচ প্রধান",
	"প্রচার/প্রকাশনা/বিজ্ঞাপন/সাইনবোর্ড", "বার্ষিক সাধারণ সভার খরচ", "প্রশিক্ষণ কর্মশালা",
	"শিক্ষা বৃত্তি/বৃক্ষরোপন/কল্যা:অনুদান", "পাঠাগার উন্নয়ন খরচ", "অডিট ফি প্রধান",
	"সমবায় উন্নয়ন তহবিল খরচ", "রিন এর ঝুঁকি তহবিল সঞ্চিতি", "কু-রিন খরচ",
	"মূলধনী মুনাফা প্রধান", "শেয়ার এর মুনাফা প্রধান", "বিবিধ খরচ"
);

// transaction nature(responsible)
$config['responsible'] = array(
    "শেয়ার মূলধন",
    "সাধারণ সঞ্চয়",
    "নিরাপত্তা সঞ্চয়",
    "আর.পি.এস",
    "সহযোগী শিশু সঞ্চয়",
    "মেয়াদী সঞ্চয়",
    "ব্যাংক ঋণ",
    "কর্মী জামানত",
    "দ্বিগুণ/তিনগুণ মেয়াদী সঞ্চয়",
	"কেন্দ্রিয় ফোরাম এর ঋণ",
    "পি এফ (কন্ট্রিভিউটরি)",
    "গ্র্যাচুইটি",
	"কল্যান তহবিল(স্টাফ)",
    "কর্মী আর পি এস",
     "তহবিল স্থিতি",
	"ঋণ বীমা (আপদকালীণ) স্থিতি",
    "সাধারণ সঞ্চয় মুনাফা সঞ্চিতি",
    "নিরাপত্তা সঞ্চয় মুনাফা সঞ্চিতি",
	"আর পি এস মুনাফা সঞ্চিতি",
    "সহযোগী শিশু মুনাফা সঞ্চিতি",
    "দ্বিগুণ/তিনগুণ মেয়াদী মুনাফা সঞ্চিতি",
	"জামানতের মুনাফা সঞ্চিতি",
    "পিএফ মুনাফা সঞ্চিতি",
    "কর্মী আর পি এস মুনাফা সঞ্চিতি",
	"ঋণ এর ঝুঁকি তহবিল সঞ্চিতি",
    "কু-ঋণ সঞ্চিতি", "অবচয় সঞ্চিতি",
	"সমবায় উন্নয়ন তহবিল সঞ্চিতি",
    "সংরক্ষিত তহবিল সঞ্চিতি",
    "অন্যান্য সঞ্চিতি",
	"সাধারণ সঞ্চয় মুনাফা",
    "নিরাপত্তা সঞ্চয় মুনাফা",
    "আর পি এস মুনাফা",
	"সহযোগী শিশু মুনাফা",
    "দ্বিগুণ/তিনগুণ মেয়াদী মুনাফা",
    "জামানতের মুনাফা",
	"পিএফ মুনাফা",
    "কর্মী আর পি এস মুনাফা",
    "ঋণ এর ঝুঁকি তহবিল",
	"কু-ঋণ",
    "অবচয়",
    "সমবায় উন্নয়ন তহবিল",
	"সংরক্ষিত তহবিল",
    "অন্যান্য"
);

// transaction nature(income)
$config['income'] = array(
    "ক্ষুদ্র ঋণের মুনাফা ১৭% (৩৯ কিস্তি) - সাপ্তাহিক", "ক্ষুদ্র ব্যবসা ঋণের মুনাফা ১৮% (১২ কিস্তি) - মাসিক",
    "ক্ষুদ্র ব্যবসা ঋণের মুনাফা ২৭% (১৮ কিস্তি) - মাসিক", "কনজুমার ঋণের মুনাফা",
    "মোটর সাইকেল ঋণের মুনাফা", "পি এফ ঋণের মুনাফা",
    "বেতন অগ্রিমের মুনাফা", "ভর্তি ফি আদায়",
    "অতিরিক্ত ভর্তি ফি অাদায়", "ডকুমেন্ট চার্জ",
    "পাশ বই বিক্রি", "রেভিনিউ টিকিট বিক্রি",
    "কর্মী অফিস ভাড়া প্রাপ্তি", "ভূমি/জমি মূল্য সংযোজন আয়",
    "পেপার বিক্রি", "নিয়োগ পরীক্ষা আয়",
    "জরিমানা আদায়", "নির্বাচনী আয়",
    "কর্মী কর্তৃক গ্যাস বিল প্রাপ্তি", "মূলধনী মুনাফা প্রাপ্তি",
    "পাঠাগার কর্তৃক আয়", "ব্যবসা বিনিয়োগ থেকে আয়",
    "বিবিধ আয়"
);

// transaction nature(property)
$config['property'] = array(
    "ক্ষুদ্র ঋণ (১৭%)", "ক্ষুদ্র ব্যবসা ঋণ(১৮%)", "ক্ষুদ্র ব্যবসা ঋণ(২৭%)", "কনজুমার ঋণ", "মোটর সাইকেল ঋণ", "সাইকেল ঋণ", "পি এফ ঋণ", "অফিস ভাড়া অগ্রিম", "বেতন অগ্রিম", "সমবায় ফোরাম শেয়ার",
    "সমবায় বাজার শেয়ার", "সমবায় ফোরাম সঞ্চয়", "সমবায় বাজার সঞ্চয়", "ভূমি/জমি মূল্য", "ইমারত/দালানকোটা", "আসবাবপত্র",
    "ইলেক্ট্রনিক্স সামগ্রী", "কম্পিউটার", "প্রাইভেট কার", "মোটর সাইকেল"
);

// all month
$config['months'] = array(
 'January', 'February', 'March', 'April','May', 'June', 'July', 'August','September', 'October', 'November', 'December'
);

// privilege
$config['privilege'] = array('super', 'admin', 'user');

// set class
$config['classes'] = array(
    'Eleven'       => 'HSC 1st Year',
    'Twelve'       => 'HSC 2nd Year',
    'Eleven(BM)'   => 'HSC(BM) 1st',
    'Twelve(BM)'   => 'HSC(BM) 2nd',
    'ba_1st_year'  => 'BA 1st Year',
    'ba_2nd_year'  => 'BA 2nd Year',
    'ba_3rd_year'  => 'BA 3rd Year',
    'bss_1st_year' => 'BSS 1st Year',
    'bss_2nd_year' => 'BSS 2nd Year',
    'bss_3rd_year' => 'BSS 3rd Year',
    'bbs_1st_year' => 'BBS 1st Year',
    'bbs_2nd_year' => 'BBS 2nd Year',
    'bbs_3rd_year' => 'BBS 3rd Year',
    'passed'       => 'passed',
    'BSC_1st_year' => 'B.S.C 1st Year',
    'BSC_2nd_year' => 'B.S.C 2nd Year',
    'BSC_3rd_year' => 'B.S.C 3rd Year'
);

// set group
$config['group'] = array(
    'None'                  => 'None',
    'Science'               => 'Science',
    'Humanities'            => 'Humanities',
    'Business-Studies'      => 'Business Studies',
    'HSC(BM)'               => 'HSC(BM)'
    /*'Computer_Oparation'    => 'Computer Oparation',
    'Secretarial_Science'   => 'Secretarial Science' */
);
// set section
$config['section'] = array(
    'None',
    'A',
    'B',
    'C',
    'Computer_Oparation',
    'Secretarial_Science'
);
// set batch
$config['batch'] = array(
    'batch_1'   => 'Batch 1',
    'batch_2'   => 'Batch 2',
    'batch_3'   => 'Batch 3',
    'batch_4'   => 'Batch 4'
);
// set shift
$config['shift'] = array(
'None'=>'None',
    'Day'       => 'Day',
    'Morning'   => 'Morning'
);
// District
$config["district"] = array(
    "Barguna", "Barisal", "Bhola",
    "Jhalokati", "Patuakhali", "Pirojpur",
    "Bandarban", "Brahmanbaria", "Chandpur",
    "Chittagong", "Comilla", "Cox's Bazar",
    "Feni", "Khagrachhari", "Lakshmipur",
    "Noakhali", "Rangamati", "Dhaka",
    "Faridpur", "Gazipur", "Gopalganj",
    "Kishoreganj", "Madaripur", "Manikganj",
    "Munshiganj", "Narayanganj", "Narsingdi",
    "Rajbari", "Shariatpur", "Tangail",
    "Bagerhat", "Chuadanga", "Jessore",
    "Jhenaidah", "Khulna", "Kushtia",
    "Magura", "Meherpur", "Narail",
    "Satkhira", "Jamalpur", "Mymensingh",
    "Netrakona", "Sherpur", "Bogra",
    "Joypurhat", "Naogaon", "Natore",
    "Chapainawabganj", "Pabna", "Rajshahi",
    "Sirajgonj", "Dinajpur", "Gaibandha",
    "Kurigram", "Lalmonirhat", "Nilphamari",
    "Panchagarh", "Rangpur", "Thakurgaon",
    "Habiganj", "Moulvibazar", "Sunamganj",
    "Sylhet"
);

// set blood_group
$config['blood_group'] = array(
    'A+',
    'A-',
    'B+',
    'B-',
    'O+',
    'O-',
    'AB+',
    'AB-',
    'Unknown'
);

// set board
$config['board'] = array(
    'Dhaka',
    'Rajshahi',
    'Comilla',
    'Jessore',
    'Chittagong',
    'Barisal',
    'Sylhet',
    'Dinajpur',
    'Madrasah',
    'Technical'
);
//set religion

$config['religion']=array(
    'islam'     => 'Islam',
    'hindu'     => 'Hindu',
    'buddhist'  => 'Buddhist',
    'christian' => 'Christian'
);
//teacher subject name list

$config['teacherSubject'] = array(
    "আবশ্যিক"             => array( "বাংলা","ইংরেজি","আই.সি.টি ","শারীরিক শিক্ষা","সাঁটলিপি","কম্পিউটার প্রোগ্রামিং","সেক্রেটারিয়াল প্রাকটিসেস"),
    "মানবিক"              => array("পৌরনীতি/রাষ্ট্রবিজ্ঞান","অর্থনীতি","ভূগোল ","সমাজকর্ম ","সমাজবিজ্ঞান","ইতিহাস","ইসলামের ইতিহাস ও সংস্কৃতি","ইসলামী শিক্ষা","যুক্তিবিদ্যা/দর্শন","মনোবিজ্ঞান","কৃষিশিক্ষা"),
    "বিজ্ঞান"              => array("পদর্থবিদ্যা","রসায়ন","উদ্ভিদবিদ্যা","প্রাণিবিদ্যা ","উচ্চতর গণিত"),
    "ব্যবসায় শিক্ষা"         => array("হিসাববিজ্ঞান","ব্যবসায় সংগঠন ","উৎপাদন ব্যবস্থাপনা ও বিপনণ ","পরিসংখ্যান","সাচিবীক বিদ্যা "),
    "এইচ.এস,সি(বি.এম)"  => array("বাংলা","ইংরেজি","কম্পিউটার অফিস এ্যাপ্লিকেশন","হিসাব বিজ্ঞান নীতিপ্রয়োগ","ব্যবসায় সংগঠন ও ব্যবস্থাপনা","মার্কেটিং নীতি ও প্রয়োগ","অর্থনীতি ও বাণিজ্যিক ভগোল","ব্যবসায়িক গণিত ও পরিসংখ্যান","কম্পিউটার প্রোগ্রামিং","সেক্রেটারিয়াল প্রাকটিসেস")
);

// set subject
$config['subject'] = array(
    'Six' => array(
        'BANGLA',
        'ENGLISH',
        'MATHEMATICS',
        'GENERAL SCIENCE',
        'RELIGION AND MORAL EDUCATION',
        'BANGLADESH AND GLOBAL STUDIES',
        'INFORMATION AND COMMUNICATION TECHNOLOGY',
        'AGRICULTURE STUDIES'
    ),
    'Seven' => array(
        'BANGLA',
        'ENGLISH',
        'MATHEMATICS',
        'GENERAL SCIENCE',
        'RELIGION AND MORAL EDUCATION',
        'BANGLADESH AND GLOBAL STUDIES',
        'INFORMATION AND COMMUNICATION TECHNOLOGY',
        'AGRICULTURE STUDIES'
    ),
    'Eight' => array(
        'BANGLA',
        'ENGLISH',
        'MATHEMATICS',
        'GENERAL SCIENCE',
        'RELIGION AND MORAL EDUCATION',
        'BANGLADESH AND GLOBAL STUDIES',
        'INFORMATION AND COMMUNICATION TECHNOLOGY',
        'AGRICULTURE STUDIES'
    ),
    'Nine' => array(
        "BANGLA",
        "ENGLISH",
        "MATHEMATICS",
        "RELIGION AND MORAL EDUCATION",
        "INFORMATION AND COMMUNICATION TECHNOLOGY",
        "CAREER EDUCATION",
        "PHYSICAL EDUCATION",
        "PHYSICS",
        "CHEMISTRY",
        "HIGHER MATHEMATICS",
        "AGRICULTURE STUDIES",
        "BANGLADESH AND GLOBAL STUDIES",
        "GENERAL SCIENCE",
        "ECONOMICS",
        "BIOLOGY",
        "HISTORY OF BANGLADESH AND WORLD CIVILISATION",
        "GEOGRAPHY AND ENVIRONMENT"
    ),
    'Ten' => array(
        "BANGLA",
        "ENGLISH",
        "MATHEMATICS",
        "RELIGION AND MORAL EDUCATION",
        "INFORMATION AND COMMUNICATION TECHNOLOGY",
        "CAREER EDUCATION",
        "PHYSICAL EDUCATION",
        "PHYSICS",
        "CHEMISTRY",
        "HIGHER MATHEMATICS",
        "AGRICULTURE STUDIES",
        "BANGLADESH AND GLOBAL STUDIES",
        "GENERAL SCIENCE",
        "ECONOMICS",
        "BIOLOGY",
        "HISTORY OF BANGLADESH AND WORLD CIVILISATION",
        "GEOGRAPHY AND ENVIRONMENT"
    ),
    'Eleven' => array(
        "BANGLA",
        "ENGLISH",
        "ICT",
        "PHYSICS",
        "CHEMISTRY",
        "BIOLOGY",
        "HIGHER MATHEMATICS",
        "HISTORY",
        "SOCIAL WORK",
        "CIVICS",
        "SOCIOLOGY",
        "ISLAMIC HISTORY AND CULTURE",
        "ISLAMIC STUDIES",
        "LOGIC",
        "GEOGRAPHY",
        "PSYCHOLOGY",
        "ECONOMICS",
        "ACCOUNTING",
        "PRODUCTION MANAGEMENT AND MARKETING",
        "BUSINESS MANAGEMENT",
        "STATISTICS",
        "SOCIAL SCIENCE",
        "AGRICULTURE STUDIES"
    ),
    'Twelve' => array(
        "BANGLA",
        "ENGLISH",
        "ICT",
        "PHYSICS",
        "CHEMISTRY",
        "BIOLOGY",
        "HIGHER MATHEMATICS",
        "HISTORY",
        "SOCIAL WORK",
        "CIVICS",
        "SOCIOLOGY",
        "ISLAMIC HISTORY AND CULTURE",
        "ISLAMIC STUDIES",
        "LOGIC",
        "GEOGRAPHY",
        "PSYCHOLOGY",
        "ECONOMICS",
        "ACCOUNTING",
        "PRODUCTION MANAGEMENT AND MARKETING",
        "STATISTICS",
        "SOCIAL SCIENCE",
        "AGRICULTURE STUDIES",
        "BUSINESS ORGANISATION & MANAGEMENT"
    ),
    'Eleven(BM)' => array(
        "BANGLA",
        "ENGLISH",
        "COMPUTER OFFICE APPLICATIONS",
        "ACCOUNTING POLICY",
        "BUSINESS ORGANIZATION AND MANAGEMENT",
        "MARKETING POLICIES AND APPLICATIONS",
        "ECONOMY AND COMMERCIAL VULTURE",
        "BUSINESS MATHEMATICS AND STATISTICS",
        "COMPUTER PROGRAMMING",
        "SECRETARIAL PRACTICE",
        "HUMAN RESOURCE MANAGEMENT"
    ),
    'Twelve(BM)' => array(
        "BANGLA",
        "ENGLISH",
        "COMPUTER OFFICE APPLICATIONS",
        "ACCOUNTING POLICY",
        "BUSINESS ORGANIZATION AND MANAGEMENT",
        "MARKETING POLICIES AND APPLICATIONS",
        "ECONOMY AND COMMERCIAL VULTURE",
        "BUSINESS MATHEMATICS AND STATISTICS",
        "COMPUTER PROGRAMMING",
        "SECRETARIAL PRACTICE",
        "BUSINESS ENGLISH COMMUNICATION",
        "OFFICE MANAGEMENT",
        "DATABASE MANAGEMENT SYSTEM",
        "LIVE SKILL DEVELOPMENT"
    )
);
$config["optional"] = array(
        "None",
        "BIOLOGY",
        "HIGHER MATHEMATICS",
        "STATISTICS",
        "AGRICULTURE STUDIES",
        "HOME SCIENCE",
		"PSYCHOLOGY",
		"ISLAM STUDIES",
		"LOGIC",
		"SOCIAL WORK",
		"COMPUTER STUDIES",
		"COMPUTER PROGRAMMING",
        "SECRETARIAL PRACTICE",
        "Geography",
        "Economic"
   );
// set subject Customize
$config['subjects'] = array(
	'compolsury' => array(
		array('BANGLA', 'বাংলা', '101'),
		array('ENGLISH', 'ইংরেজী', '107'),
		array('ICT', 'তথ্য ও যোগাযোগ প্রযুক্তি', '275'),
	),
	'science' 		=> array(
		'compolsury' => array(
			array(
	            array('BIOLOGY', 'জীববিজ্ঞান', '178'),
                array('HIGHER MATH', 'উচ্চতর গণিত', '265')
            )
		),
		'optional' => array(
			array('BIOLOGY', 'জীববিজ্ঞান', '178'),
            array('HIGHER MATH', 'উচ্চতর গণিত', '265')
		)
	),
	'humanities' 	=> array(
		'compolsury' => array(
			array(
			    array('CIVICS & GOOD GOVERNANCE','পৌরনীতি ও সুশাসন','269'),
			    array('Social Work', 'Social Work', '271'),
			    array('History', 'History', '304'),
			    array('Geography', 'Geography', '125'),
				array('ECONOMICS', 'অর্থনীতি', '109'),
                array('LOGIC', 'যুক্তিবিদ্যা', '121'),
                array('SOCIOLOGY', 'সমাজ বিজ্ঞান', '117'),              			
				array('ISLAMIC HISTORY AND CULTURE', 'ইসলামের ইতিহাস ও সংস্কৃতি', '267')
                
            	/*array('SOCIOLOGY', 'সমাজ বিজ্ঞান', '117'),            			
				
				array('ISLAM HISTORY AND CULTURE', 'ইসলামের ইতিহাস ও সংস্কৃতি', '267'),
				array('Geography', 'Geography', '125'),*/
			),
			array(
				array('ECONOMICS', 'অর্থনীতি', '109'),
				array('CIVICS & GOOD GOVERNANCE','পৌরনীতি ও সুশাসন','269'),
            			array('SOCIOLOGY', 'সমাজ বিজ্ঞান', '117'),            			
				array('ISLAM HISTORY AND CULTURE', 'ইসলামের ইতিহাস ও সংস্কৃতি', '267')
			),
			array(
			        array('LOGIC', 'যুক্তিবিদ্যা', '121'),
				array('SOCIOLOGY', 'সমাজ বিজ্ঞান', '117'),              			
				array('ISLAM HISTORY AND CULTURE', 'ইসলামের ইতিহাস ও সংস্কৃতি', '267')
			),
		),
		'optional' => array(
            /*array('ECONOMICS', 'অর্থনীতি', '109'),
            array('LOGIC', 'যুক্তিবিদ্যা', '121'),
            array('Social Work', 'Social Work', '272'),
            array('Geography', 'Geography', '125'),*/
            
            array('Agriculture Education', 'Agriculture Education', '239'),
            array('Psychology', 'Psychology', '123'),
            array('Islamic Studies', 'Islamic Studies', '249'),
            
        
		)
	),
    'degree'         => array(
        'compolsury' => array(
            array(
                array('Political and Cultural History of Islam (upto 750 A.D) Paper-I','Political and Cultural History of Islam (upto 750 A.D) Paper-I','111601'),                      
                        array('Political and Cultural History of Islam (750-1258 A.D) Paper-II','Political and Cultural History of Islam (750-1258 A.D) Paper-II','111603'),
                        array('History of the Muslims in India (712-1526 A.D) Paper-III','History of the Muslims in India (712-1526 A.D) Paper-III', '121601'),
                        array('History of the Muslims in India(1526-1858 A.D) Paper-IV','History of the Muslims in India(1526-1858 A.D) Paper-IV', '121603'),
                        array('History of Modern Europe Paper-V','History of Modern Europe Paper-V', '131601'),
                        array('History of  The Middle East (1258-1924 A.D)','History of  The Middle East (1258-1924 A.D)', '131603'),
                        array('Principles of Accounting Paper-I','Principles of Accounting Paper-I', '112501'),
                        array('Auditing Paper-II','Auditing Paper-II', '112503'),
                        array('Intermediate Accounting Paper-III','Intermediate Accounting Paper-III', '122501'),
                        array('Taxation in Bangladesh Paper-IV','Taxation in Bangladesh Paper-IV', '122503'),
                        array('Advanced Accounting Paper-V','Advanced Accounting Paper-V', '132501'),
                        array('Cost Accounting Paper-VI','Cost Accounting Paper-VI', '132503'),
                        array('Principles of Finance Paper-I','Principles of Finance Paper-I', '112401'),
                        array('Law and Practices of Banking and Insurance Paper-II','Law and Practices of Banking and Insurance Paper-II', '112403'),
                        array('Public Finance & Taxation Paper-III','Public Finance & Taxation Paper-III', '122401'),
                        array('Financial Markets & Fundamentals of Investment Paper-IV','Financial Markets & Fundamentals of Investment Paper-IV', '122403'),
                        array('International Trade &  Finance Paper-V','International Trade &  Finance Paper-V', '132401'),
                        array('E-Banking and E-Commerce Paper-VI','E-Banking and E-Commerce Paper-VI', '132403'),
                        array('Introduction to Business Paper-I','Introduction to Business Paper-I', '112601'),
                        array('Fundamentals of Management-II','Fundamentals of Management-II', '112602'),
                        array('Legal Environment of Business Paper-III','Legal Environment of Business Paper-III', '122601'),
                        array('Business Communication Paper-IV','Business Communication Paper-IV', '122603'),
                        array('Computer in Business -V','Computer in Business -V', '132601'),
                        array('Organizational Behavior-VI','Organizational Behavior-VI', '132603'),
                        array('Principles of Marketing-I','Principles of Marketing-I', '112301'),
                        array('Export-Import Management-II','Export-Import Management-II', '112303'),
                        array('Marketing Promotion-III','Marketing Promotion-III', '122301'),
                        array('Marketing Management -IV','Marketing Management -IV', '122303'),
                        array('Legal Aspects of Marketing -V','Legal Aspects of Marketing -V', '132301'),
                        array('Agricultural Marketing -VI','Agricultural Marketing -VI', '132303'),
                        array('Microeconomics –I','Microeconomics –I', '112201'),
                        array('Bangladesh Economy-II','Bangladesh Economy-II', '112203'),
                        array('Macroeconomics-III','Macroeconomics-III  ', '122201'),
                        array('Money, Banking, International Trade and Public Finance –IV','Money, Banking, International Trade and Public Finance –IV', '122203'),
                        array('Elementary Mathematics for Economics and Basic Statistics','Elementary Mathematics for Economics and Basic Statistics', '132201'),
                        array('Demography -V','Demography -V', '132203'),
                        array('History of Economic Thought -VI','History of Economic Thought -VI', '132205'),
                        array('Political Theory-I','Political Theory-I', '111901'),
                        array('Political Organization and The Political System of UK and USA-II','Political Organization and The Political System of UK and USA-II', '111903'),
                        array('Government and Politics of Bangladesh-III','Government and Politics of Bangladesh-III', '121901'),
                        array('Political Economy of Bangladesh -IV','Political Economy of Bangladesh -IV', '121903'),
                        array('Local Government and Rural Politics in Bangladesh-V','Local Government and Rural Politics in Bangladesh-V', '131901'),
                        array('Women and Politics-VI','Women and Politics-VI', '131903'),
                        array('Introductory Sociology -I','Introductory Sociology -I', '112001'),
                        array('Social History & Anthropology -II','Social History & Anthropology -II', '112003'),
                        array('Classical Social Thought -III','Classical Social Thought -III', '122001'),
                        array('Social Psychology-IV','Social Psychology-IV ', '122003'),
                        array('Sociology of Environment -V','Sociology of Environment -V ', '132001'),
                        array('Sociology of Bangladesh-VI','Sociology of Bangladesh-VI ', '132003')
            ),
           
        ),
        'optional' => array(
            array('Not Abilable')
                    
        )
    ),

	'business studies' 		=> array(
		'compolsury' => array(
			array(
	            //array('Finance, Banking, and Insurance', 'Finance, Banking, and Insurance', '292'),
	            array('Production Management and Marketing', 'Production Management and Marketing', '286'),
			)
		),
		'optional' => array(
            array('Statistics', 'Statistics', '129'),
            //array('ECONOMICS', 'অর্থনীতি', '109')
		)
	),
);

$config['edit_optional_subject'] = array(
    'BIOLOGY'       => '178',
    'HIGHER MATH'   => '265',
    'ECONOMICS'     =>'109',
    'LOGIC'         =>'121',
    'Social Work'   =>'272',
    'Geography'     =>'125',
    'Finance, Banking and Insurance'       =>'292',
    'Statistics'       =>'129',
    
);