<?php

use Illuminate\Database\Seeder;

class PartnervaluemapsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('partnervaluemaps')->delete();
        
        \DB::table('partnervaluemaps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'month_mapper_test',
                'valuemap' => '[["==","1","01"],["==","2","02"],["==","3","03"],["==","4","04"],["==","5","05"],["==","6","06"],["==","7","07"],["==","8","08"],["==","9","09"],["==","10","10"],["==","11","11"],[">=","12","12"]]',
                'description' => 'test',
                'updated_at' => '2017-09-19 09:01:28',
                'created_at' => '2017-09-19 09:01:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'mixed_mapper_test',
                'valuemap' => '[[">","20","greater than 20 it\'s all money!"],[">=","10","10 spot son!"],["==","5","it\'s five baby!"],["<","4","less than 4, walk the dinosaur!"],["<=","3","brah, less than or equal to three"]]',
                'description' => 'test',
                'updated_at' => '2017-09-19 09:01:28',
                'created_at' => '2017-09-19 09:01:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'string_mapper_test',
                'valuemap' => '[["==","Knock knock","whose there?"],["==","abe","defg"]]',
                'description' => 'test',
                'updated_at' => '2017-09-19 09:01:29',
                'created_at' => '2017-09-19 09:01:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'general_abbrev_to_state_map',
                'valuemap' => '{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"}',
                'description' => 'general',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'lead_conduit_credit_grade',
                'valuemap' => '[
["in_array", ["POOR", "AVERAGE", "GOOD", "FAIR"], "Good"],
["==" , "EXCELLENT", "Excellent"]
]',
                'description' => 'lead conduit',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'rent_or_own',
                'valuemap' => '{"Own":"Yes", "Rent":"No"}',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'lead_conduit_prop_desc_map',
                'valuemap' => '[
["in_array", ["single_fam", "single family home"], "Single Family Home"],
["==", "condo",  "Condominium"],
["==","townhouse", "Townhouse"],
["==","bungalow", "Bungalow"],
["==","apartment","Apartment"],
["==","cottage","Cottage"],
["==", "semi-detached", "Semi-detached"],
["default", "Single Family Home"]
]',
                'description' => 'lead conduit',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'lead_conduit_credit_score_map',
                'valuemap' => '[
["<=","300","300"],
["<=","350","350"],
["<=","400","400"],
["<=","450","450"],
["<=","500","500"],
["<=","550","550"],
["<=","600","600"],
["<=","750","750"],
["<=","800","800"],
["<=","850","850"],
[">","850","850"]
]
',
                'description' => 'lead conduit',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'revi_convert_to_state_abbrev_map',
                'valuemap' => '{
"Alabama": "AL",
"Alaska": "AK",
"Arizona": "AZ",
"Arkansas": "AR",
"California": "CA",
"Colorado": "CO",
"Connecticut": "CT",
"Delaware": "DE",
"Florida": "FL",
"Georgia": "GA",
"Hawaii": "HI",
"Idaho": "ID",
"Illinois": "IL",
"Indiana": "IN",
"Iowa": "IA",
"Kansas": "KS",
"Kentucky": "KY",
"Louisiana": "LA",
"Maine": "ME",
"Maryland": "MD",
"Massachusetts": "MA",
"Michigan": "MI",
"Minnesota": "MN",
"Mississippi": "MS",
"Missouri": "MO",
"Montana": "MT",
"Nebraska": "NE",
"Nevada": "NV",
"New Hampshire": "NH",
"New Jersey": "NJ",
"New Mexico": "NM",
"New York": "NY",
"North Carolina": "NC",
"North Dakota": "ND",
"Ohio": "OH",
"Oklahoma": "OK",
"Oregon": "OR",
"Pennsylvania": "PA",
"Rhode Island": "RI",
"South Carolina": "SC",
"South Dakota": "SD",
"Tennessee": "TN",
"Texas": "TX",
"Utah": "UT",
"Vermont": "VT",
"Virginia": "VA",
"Washington": "WA",
"West Virginia": "WV",
"Wisconsin": "WI",
"Wyoming": "WY",
"AL": "AL",
"AK": "AK",
"AS": "AS",
"AZ": "AZ",
"AR": "AR",
"CA": "CA",
"CO": "CO",
"CT": "CT",
"DE": "DE",
"DC": "DC",
"FM": "FM",
"FL": "FL",
"GA": "GA",
"GU": "GU",
"HI": "HI",
"ID": "ID",
"IL": "IL",
"IN": "IN",
"IA": "IA",
"KS": "KS",
"KY": "KY",
"LA": "LA",
"ME": "ME",
"MH": "MH",
"MD": "MD",
"MA": "MA",
"MI": "MI",
"MN": "MN",
"MS": "MS",
"MO": "MO",
"MT": "MT",
"NE": "NE",
"NV": "NV",
"NH": "NH",
"NJ": "NJ",
"NM": "NM",
"NY": "NY",
"NC": "NC",
"ND": "ND",
"MP": "MP",
"OH": "OH",
"OK": "OK",
"OR": "OR",
"PW": "PW",
"PA": "PA",
"PR": "PR",
"RI": "RI",
"SC": "SC",
"SD": "SD",
"TN": "TN",
"TX": "TX",
"UT": "UT",
"VT": "VT",
"VI": "VI",
"VA": "VA",
"WA": "WA",
"WV": "WV",
"WI": "WI",
"WY": "WY",
"AE": "AE",
"AA": "AA",
"AP": "AP"
}',
                'description' => 'revi',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'revi_purchase_time_frame_map',
                'valuemap' => '[
["less_than_or_equals", "3", "0-3 months"],
["less_than_or_equals", "6", "3-6 months"],
["less_than_or_equals", "12", "6-12 months"],
["greater_than", "12", "12+ months"],
["in_array", [""], "Not sure"],
["default", "0-3 months"]
]',
                'description' => 'revi',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'revi_property_type_map',
                'valuemap' => '[
["equals", "SINGLE_FAM", "Single family home"],
["equals", "MULTI_FAM", "Multi-family home"],
["in_array", ["TOWNHOME", "TOWNHOUSE"], "Townhouse"],
["equals", "CONDO", "Condo"],
["equals", "MOBILEHOME", "Mobile home"],
["default", "Single family home"]
]',
                'description' => 'revi',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'revi_property_use_map',
                'valuemap' => '[
["in_array", ["primary", "Primary home"], "Primary home"],
["in_array", ["secondary", "secondary_vactn", "secondary_vacation", "Secondary home"], "Secondary home"],
["in_array", ["rental", "investment", "Rental property"], "Rental property"],
["default", "Primary home"]
]',
                'description' => 'revi',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'general_state_to_abbrev_map',
                'valuemap' => '{
"Alabama": "AL",
"Alaska": "AK",
"Arizona": "AZ",
"Arkansas": "AR",
"California": "CA",
"Colorado": "CO",
"Connecticut": "CT",
"Delaware": "DE",
"Florida": "FL",
"Georgia": "GA",
"Hawaii": "HI",
"Idaho": "ID",
"Illinois": "IL",
"Indiana": "IN",
"Iowa": "IA",
"Kansas": "KS",
"Kentucky": "KY",
"Louisiana": "LA",
"Maine": "ME",
"Maryland": "MD",
"Massachusetts": "MA",
"Michigan": "MI",
"Minnesota": "MN",
"Mississippi": "MS",
"Missouri": "MO",
"Montana": "MT",
"Nebraska": "NE",
"Nevada": "NV",
"New Hampshire": "NH",
"New Jersey": "NJ",
"New Mexico": "NM",
"New York": "NY",
"North Carolina": "NC",
"North Dakota": "ND",
"Ohio": "OH",
"Oklahoma": "OK",
"Oregon": "OR",
"Pennsylvania": "PA",
"Rhode Island": "RI",
"South Carolina": "SC",
"South Dakota": "SD",
"Tennessee": "TN",
"Texas": "TX",
"Utah": "UT",
"Vermont": "VT",
"Virginia": "VA",
"Washington": "WA",
"West Virginia": "WV",
"Wisconsin": "WI",
"Wyoming": "WY"
}',
                'description' => 'general',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'revi_foreclosure_time_map',
                'valuemap' => '[
["less_than", "1", "Less than 1 year"],
["equals", "1", "1 Year"],
["equals", "2", "2 Years"],
["equals", "3", "3 Years"],
["equals", "4", "4 Years"],
["equals", "5", "5 Years"],
["greater_than", "5", "More than 5 years"]
]	',
                'description' => 'revi forclosure time',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'revi_downpayment_map',
                'valuemap' => '[
["equals", "0", "0%25"],
["equals", "5", "5%25"],
["equals", "10", "10%25"],
["equals", "15", "15%25"],
["equals", "20", "20%25"],
["equals", "25", "25%25"],
["equals", "30", "30%25"],
["equals", "40", "40%25"],
["equals", "50", "50%25"],
["greater_than", "50", "More than 50%25"]
]',
                'description' => 'revi downpayment map',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'revi_credit_rating_map',
                'valuemap' => '[
["in_array", ["Excellent", "excellent", "EXCELLENT", "VERY GOOD", "very good"], "Excellent"],
["in_array", ["Good", "GOOD", "good"], "Good"],
["in_array", ["AVERAGE", "FAIR",  "fair", "average"], "Some Problems"],
["in_array", ["POOR", "poor"], "Major Problems"]
]',
                'description' => 'revi credit rating map',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'revi_bankrupcy_time_map',
                'valuemap' => '[
["in_array", ["No", "0", "N"], "No"],
["less_than", "1", "Less than 1 year"],
["equals", "1", "1 Year"],
["equals", "2", "2 Years"],
["equals", "3", "3 Years"],
["equals", "4", "4 Years"],
["equals", "5", "5 Years"],
["greater_than", "5", "More than 5 years"]

]',
                'description' => 'bankruptcy time map',
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'revi_behind_on_payments_map',
                'valuemap' => '[
["equals", "0", "not behind"],
["equals", "1", "1 month late"],
["equals", "2", "2 month late"],
["equals", "3", "3 month late"],
["equals", "4", "4 month late"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'general_yes_no_map',
                'valuemap' => '[
["in_array", ["No", "0", "N"], "No"],
["in_array", ["Yes", "1", "Y"], "Yes"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'revi_any_mortgages_map',
                'valuemap' => '[
["in_array", ["No", "0", "N"], "No"],
["equals", "First", "First Mortgage Only"],
["equals", "FirstSecond", "First and Second Mortgages"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'revi_interest_rate_percentage_map',
                'valuemap' => '[
["equals", "2.0", "2.00"],
["equals", "2.5", "2.50"],
["equals", "3.0", "3.00"],
["equals", "3.5", "3.50"],
["equals", "4.0", "4.00"],
["equals", "4.5", "4.50"],
["equals", "5.0", "5.00"],
["equals", "5.5", "5.50"],
["equals", "6.0", "6.00"],
["equals", "6.5", "6.50"],
["equals", "7.0", "7.00"],
["equals", "7.5", "7.50"],
["equals", "8.0", "8.00"],
["equals", "8.5", "8.50"],
["equals", "9.0", "9.00"],
["equals", "9.5", "9.50"],
["equals", "10.0", "10.00"],
["greater_than", "10.0", "10.00 +"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'revi_loan_type_map',
                'valuemap' => '[
["in_array", ["Purchase"], "Purchase"],
["in_array", ["Refinance"], "Refinance"],
["in_array", [], "Home equity"],
["in_array", [], "Reverse mortgage"],
["default", "Purchase"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'revi_money_map',
                'valuemap' => '[
["less_than_or_equals", "50000", "$50,000 or less"],
["less_than_or_equals", "75000", "$50,001 - 75,000"],
["less_than_or_equals", "100000", "$75,001 - 100,000"],
["less_than_or_equals", "125000", "$100,001 - 125,000"],
["less_than_or_equals", "150000", "$125,001 - 150,000"],
["less_than_or_equals", "175000", "$150,001 - 175,000"],
["less_than_or_equals", "200000", "$175,001 - 200,000"],
["less_than_or_equals", "250000", "$200,001 - 250,000"],
["less_than_or_equals", "300000", "$250,001 - 300,000"],
["less_than_or_equals", "350000", "$300,001 - 350,000"],
["less_than_or_equals", "400000", "$350,001 - 400,000"],
["less_than_or_equals", "450000", "$400,001 - 450,000"],
["less_than_or_equals", "500000", "$450,001 - 500,000"],
["less_than_or_equals", "750000", "$500,001 - 750,000"],
["less_than_or_equals", "1000000", "$750,001 - 1,000,000"],
["less_than_or_equals", "1500000", "$1,000,001 - 1,500,000"],
["less_than_or_equals", "2000000", "$1,500,001 - 2,000,000"],
["greater_than", "2000000", "$1,500,001 - 2,000,000"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'revi_cash_out_map',
                'valuemap' => '[
["equals", "0", "0 (No cash)"],
["less_than_or_equals", "50000", "$25,001 - 50,000"],
["less_than_or_equals", "75000", "$50,001 - 75,000"],
["less_than_or_equals", "100000", "$75,001 - 100,000"],
["less_than_or_equals", "125000", "$100,001 - 125,000"],
["less_than_or_equals", "150000", "$125,001 - 150,000"],
["less_than_or_equals", "175000", "$150,001 - 175,000"],
["less_than_or_equals", "200000", "$175,001 - 200,000"],
["less_than_or_equals", "250000", "$200,001 - 250,000"],
["less_than_or_equals", "300000", "$250,001 - 300,000"],
["less_than_or_equals", "350000", "$300,001 - 350,000"],
["less_than_or_equals", "400000", "$350,001 - 400,000"],
["less_than_or_equals", "450000", "$400,001 - 450,000"],
["less_than_or_equals", "700000", "$450,001 - 700,000"],
["less_than_or_equals", "950000", "$700,001 - 950,000"],
["less_than_or_equals", "1450000", "$950,001 - 1,450,000"],
["less_than_or_equals", "1950000", "$1,450,001 - 1,950,000"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'revi_current_loan_map',
                'valuemap' => '[
["equals", "VA", "VA"],
["equals", "FHA", "FHA"],
["equals", "USDA", "USDA"],
["equals", "Not Sure", "Not Sure"]
]',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'revi_gender_map',
                'valuemap' => '{"M":"Male", "F":"Female"}',
                'description' => NULL,
                'updated_at' => NULL,
                'created_at' => NULL,
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'bestrate_credit_grade',
                'valuemap' => '{"Poor":"Poor", "Fair":"Fair", "Average":"Good", "Good":"Good", "Excellent":"Excellent"}',
                'description' => 'BestRate Credit Rating',
                'updated_at' => '2018-01-04 13:22:07',
                'created_at' => NULL,
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'bestrate_loan_type',
                'valuemap' => '{"fixed":"Conventional", "adjustable":"Conventional", "fixed_or_adjustable":"Conventional"}',
                'description' => 'BestRate Loan Type',
                'updated_at' => '2018-01-04 14:38:59',
                'created_at' => NULL,
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'bestrate_timeframe',
                'valuemap' => '{"immediately":"Immediately", "30_days":"30 Days", "60_days":"60 Days", "90_days":"Not Sure", "no_time_constraint":"Not Sure"}',
                'description' => 'BestRate Timeframe',
                'updated_at' => '2018-01-04 14:39:02',
                'created_at' => NULL,
            ),
        ));
        
        
    }
}