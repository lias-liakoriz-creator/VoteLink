<?php
// Default language
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'English';

$texts = [
    'English' => [
        'welcome' => 'Welcome to Votlink App',
        'Home' => 'Home',  // Added this line
        'description' => 'Empowering Ugandans with a secure and easy-to-use mobile voting system. Cast your vote with confidence in your preferred language.',
        'login' => 'Voter Login',
        'admin_login' => 'Admin Login',  // Added this line
        'voter_login' => 'Voter Login',  // Added this line
        'register' => 'Register as a Voter',
        'voter_registration' => 'Voter Registration',  // Added this line
        'nira_id' => 'NIRA ID',
        'registration_success' => 'Registration successful! You can now log in.',  // Added this line
        'registration_fail' => 'Registration failed. Please try again.',  // Added this line
        'nira_not_found' => 'NIRA ID not found or not eligible to vote.',  // Added this line
        'already_registered' => 'Already registered?',  // Added this line
        'login_here' => 'Log in here',  // Added this line
        'why_choose' => 'Why Choose Votlink App?',
        'secure' => 'Secure Voting',
        'secure_desc' => 'Your vote is confidential and secure. We use advanced encryption to protect your data.',
        'easy' => 'Easy to Use',
        'easy_desc' => 'Designed with simplicity in mind, so everyone can vote with ease.',
        'multi_language' => 'Multi-language Support',
        'multi_language_desc' => 'Vote in your preferred language: English, Luganda, Karamojong, or Kiswahili.',
        'invalid_nira' => 'Invalid NIRA ID or not registered.',
        'no_account' => "Don't have an account?",
        'register_here' => 'Register here',
    ],
    'Luganda' => [
        'welcome' => 'Tusanyuse okukulaba ku Votlink App',
        'Home' => 'Maka',  // Added this line
        'description' => 'Okuyambako Bannayuganda n’enkola y’okuvuganya eyangu era esigibwa. Fuga akalulu k’ossuubirwa nga owera omutima.',
        'login' => 'Login ya Abalonzi',
        'admin_login' => 'Yingira Nga Omutwala',  // Added this line
        'voter_login' => 'Yingira Nga Omulonzi',  // Added this line
        'register' => 'Weeronde nga Omulonzi',
        'voter_registration' => 'Okwewandiisa Kw\'Abalonzi',  // Added this line
        'nira_id' => 'NIRA ID',
        'registration_success' => 'Okwewandiisa kukyuse bulungi! Kati oyinza okweyingiza.',  // Added this line
        'registration_fail' => 'Okwewandiisa tekukyayidde. Gweleda ddamu.',  // Added this line
        'nira_not_found' => 'NIRA ID eno tebannaba kwewandiisa.',  // Added this line
        'already_registered' => 'Wewandiisiza dda?',  // Added this line
        'login_here' => 'Yingira wano',  // Added this line
        'why_choose' => 'Lwaki okozesa Votlink App?',
        'secure' => 'Okulonda okw’ekyama',
        'secure_desc' => 'Ekalulu kammwe kiyibwa munda. Tukozesa enkola y’okutereka endagiriro okw’ekyama.',
        'easy' => 'Kyangu okukozesa',
        'easy_desc' => 'Tukola nga kyangu okukozesa, buli muntu asobola okulonda nga afunye obulungi.',
        'multi_language' => 'Obuyambi bw’ennimi',
        'multi_language_desc' => 'Londa mu lulimi lw’oyagala: Luganda, Karamojong, Kiswahili, oba Olungereza.',
        'invalid_nira' => 'NIRA ID eno tebannaba kwewandiisa.',
        'no_account' => 'Tolinga akawunta?',
        'register_here' => 'Weewandiise wano',
    ],
    'Karamojong' => [
        'welcome' => 'Iki jawunitai na Votlink App',
        'Home' => 'Manyatta',  // Added this line (assuming "Manyatta" could be home in Karamojong)
        'description' => 'Tusaidia wananchi wa Uganda na mfumo wa kupiga kura ulio salama na rahisi kutumia. Pigia kura kwa amani katika lugha unayoipenda.',
        'login' => 'Ingia ya Mpiga Kura',
        'admin_login' => 'Ingia ya Mtawala',  // Added this line (translate accordingly)
        'voter_login' => 'Ingia ya Mpiga Kura',  // Added this line (translate accordingly)
        'register' => 'Jiandikishe kama Mpiga Kura',
        'voter_registration' => 'Usajili wa Mpiga Kura',  // Added this line
        'nira_id' => 'NIRA ID',
        'registration_success' => 'Usajili umekamilika! Sasa unaweza kuingia.',  // Added this line (translate accordingly)
        'registration_fail' => 'Usajili umeshindikana. Tafadhali jaribu tena.',  // Added this line (translate accordingly)
        'nira_not_found' => 'NIRA ID haijajisajiliwa.',  // Added this line (translate accordingly)
        'already_registered' => 'Tayari umejisajili?',  // Added this line (translate accordingly)
        'login_here' => 'Ingia hapa',  // Added this line (translate accordingly)
        'why_choose' => 'Kwa nini uchague Votlink App?',
        'secure' => 'Kupiga kura kwa usalama',
        'secure_desc' => 'Kura yako ni siri na salama. Tunatumia usimbaji wa hali ya juu kulinda data yako.',
        'easy' => 'Rahisi kutumia',
        'easy_desc' => 'Imeundwa kwa urahisi ili kila mtu aweze kupiga kura kwa urahisi.',
        'multi_language' => 'Msaada wa Lugha nyingi',
        'multi_language_desc' => 'Piga kura kwa lugha unayoipenda: Luganda, Karamojong, Kiswahili, au Kiingereza.',
        'invalid_nira' => 'NIRA ID haijajisajiliwa.',
        'no_account' => 'Huna akaunti?',
        'register_here' => 'Jiandikishe hapa',
    ],
    'Kiswahili' => [
        'welcome' => 'Karibu kwenye Votlink App',
        'Home' => 'Nyumbani',  // Added this line
        'description' => 'Tunawezesha wananchi wa Uganda kwa mfumo wa kupiga kura ulio salama na rahisi kutumia. Pigia kura kwa uhakika katika lugha unayoipenda.',
        'login' => 'Ingia kama Mpiga Kura',
        'admin_login' => 'Ingia kama Mtawala',  // Added this line
        'voter_login' => 'Ingia kama Mpiga Kura',  // Added this line
        'register' => 'Jiandikishe kama Mpiga Kura',
        'voter_registration' => 'Usajili wa Mpiga Kura',  // Added this line
        'nira_id' => 'NIRA ID',
        'registration_success' => 'Usajili umefanikiwa! Sasa unaweza kuingia.',  // Added this line
        'registration_fail' => 'Usajili umeshindikana. Tafadhali jaribu tena.',  // Added this line
        'nira_not_found' => 'NIRA ID haijasajiliwa au haiko sahihi.',  // Added this line
        'already_registered' => 'Tayari una akaunti?',  // Added this line
        'login_here' => 'Ingia hapa',  // Added this line
        'why_choose' => 'Kwa nini uchague Votlink App?',
        'secure' => 'Kupiga Kura kwa Usalama',
        'secure_desc' => 'Kura yako ni siri na salama. Tunatumia usimbaji wa hali ya juu kulinda data yako.',
        'easy' => 'Rahisi Kutumia',
        'easy_desc' => 'Imeundwa kwa urahisi ili kila mtu aweze kupiga kura kwa urahisi.',
        'multi_language' => 'Msaada wa Lugha Nyingi',
        'multi_language_desc' => 'Piga kura kwa lugha unayoipenda: Luganda, Karamojong, au Kiingereza.',
        'invalid_nira' => 'NIRA ID haijasajiliwa au haiko sahihi.',
        'no_account' => 'Huna akaunti?',
        'register_here' => 'Jiandikishe hapa',
    ]
];
?>
