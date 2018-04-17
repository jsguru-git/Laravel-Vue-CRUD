<?php

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('partners')->delete();
        
        \DB::table('partners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Justin Loans',
                'protocol' => 'https',
                'domain' => '7671864174.mortgage-application.net',
                'base_url' => '/WebApp/',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Inbound Intel, LLC',
                'protocol' => 'https',
                'domain' => 'api.five9.com',
                'base_url' => '/wsadmin/v9_3/AdminWebService',
                'search' => 'wsdl&user=five9api@rxmg.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Joseph Migliaccio',
                'protocol' => 'https',
                'domain' => 'preapp1003.com',
                'base_url' => '/id/Joseph-Migliaccio/',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'SmartFHA',
                'protocol' => 'http',
                'domain' => 'smartfha.com',
                'base_url' => '/lp2new',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Rx Marketing',
                'protocol' => 'https',
                'domain' => 'api.rxmg.bid',
                'base_url' => '/api/contact/new',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Revi',
                'protocol' => 'http',
                'domain' => 'api.revimedia.com',
                'base_url' => '/lxpbase',
                'search' => 'command=lead.manual&Vertical=mortgage#mortgageRequest',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'eFolks',
                'protocol' => 'https',
                'domain' => 'www.efolks.com',
                'base_url' => '/publishers/posting.html',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'BriteBox',
                'protocol' => 'http',
                'domain' => 'api.britetrack.io',
                'base_url' => '/hp/post.php',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Credit Fix',
                'protocol' => 'https',
                'domain' => 'www.creditfix.com',
                'base_url' => '/',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Lead Conduit',
                'protocol' => 'https',
                'domain' => 'classic.leadconduit.com',
                'base_url' => '/v2/PostLeadAction',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Bronto',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'PMO_ping',
                'protocol' => 'https',
                'domain' => 'leads.dealermarketingservices.co',
                'base_url' => '/isapi/leadserver.dl',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'PMO_post',
                'protocol' => 'https',
                'domain' => 'leads.dealermarketingservices.co',
                'base_url' => '/isapi/leadserver.dl',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'DT_ping',
                'protocol' => 'http',
                'domain' => 'lp.rxstats.com',
                'base_url' => '/l/p/DT',
                'search' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'DT_post',
                'protocol' => 'http',
                'domain' => 'production.detroittradingexchange.com',
                'base_url' => '/DTExchange.asmx/SellGX',
                'search' => 'DebugMode=False&User=0000-4204&password=4204XX',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'RP_ping',
                'protocol' => 'http',
                'domain' => 'lp.rxstats.com',
                'base_url' => '/l/p/RP',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'RP_post',
                'protocol' => 'https',
                'domain' => 'api.jangl.com',
                'base_url' => '/v2/auto_finance/post',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'ACE_ping',
                'protocol' => 'http',
                'domain' => 'lp.rxstats.com',
                'base_url' => '/l/p/ACE',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'ACE_post',
                'protocol' => 'https',
                'domain' => 'www.fundingway.com',
                'base_url' => '/ace/AutoFinancePost.php',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'IFMG_ping',
                'protocol' => 'https',
                'domain' => 'app.interactivefmg.com',
                'base_url' => '/partners/zips/fullping.aspx',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'IFMG_post',
                'protocol' => 'https',
                'domain' => 'app.interactivefmg.com',
                'base_url' => '/partners/standard/post.aspx',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'CLA_ping',
                'protocol' => 'http',
                'domain' => 'lp.rxstats.com',
                'base_url' => '/l/p/CLA',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'CLA_post',
                'protocol' => 'http',
                'domain' => 'cisco.carloanasap.com',
                'base_url' => '/LeadEngine/Post.ashx',
                'search' => 'passcode=3Nain4Szwj8Gh2H&IsTest=false',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'VPM_ping',
                'protocol' => 'http',
                'domain' => 'lp.rxstats.com',
                'base_url' => '/l/p/VPM',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'VPM_post',
                'protocol' => 'https',
                'domain' => 'www.v-preporting.com:444',
                'base_url' => '/lead/vp_post.asp',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'IMP_ping',
                'protocol' => 'http',
                'domain' => 'lp.rxstats.com',
                'base_url' => '/l/p/IPM',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'IMP_post',
                'protocol' => 'https',
                'domain' => 'leads.imperiomedia.com',
                'base_url' => '/Leads/LeadPost.aspx',
                'search' => 'CampaignId=81A3875C8401ECB654C4FDEFB50C366C&IsTest=False',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'BAR_ping',
                'protocol' => 'https',
                'domain' => 'lead.barnone.com',
                'base_url' => '/new_api/api.php',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'BAR_post',
                'protocol' => 'https',
                'domain' => 'lead.barnone.com',
                'base_url' => '/new_api/api.php',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 32,
                'name' => 'BSK_ping',
                'protocol' => 'https',
                'domain' => 'secure.blueskymg.com',
                'base_url' => '/AFLPost/Test/PingPTest.aspx',
                'search' => 'testing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 33,
                'name' => 'BSK_post',
                'protocol' => 'https',
                'domain' => 'secure.blueskymg.com',
                'base_url' => '/AFLPost/Test/PingPTest.aspx',
                'search' => 'testing',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 34,
                'name' => 'aweber',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 35,
                'name' => 'bronto',
                'protocol' => 'https',
                'domain' => 'api.bronto.com',
                'base_url' => '/v4',
                'search' => 'wsdl',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 36,
                'name' => 'campaigner',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 37,
                'name' => 'campaignmonitor',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 38,
                'name' => 'getResponse',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 39,
                'name' => 'ibmSilverpop',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 40,
                'name' => 'iContact',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'infusionsoft',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 42,
                'name' => 'iterable',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 43,
                'name' => 'klavio',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 44,
                'name' => 'mautic',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 45,
                'name' => 'sendgrid',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 46,
                'name' => 'sharpSpring',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 47,
                'name' => 'tailoredMail',
                'protocol' => 'https',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 48,
                'name' => 'KeithJenkins',
                'protocol' => 'smtp',
                'domain' => NULL,
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 49,
                'name' => 'Best Rate Referrals - Mortgage',
                'protocol' => 'http',
                'domain' => 'brrleads.com',
                'base_url' => '/post/cake.aspx',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 50,
                'name' => 'Autosaver Online',
                'protocol' => 'http',
                'domain' => 'internal',
                'base_url' => NULL,
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 51,
                'name' => 'RxMG PingTree',
                'protocol' => 'http',
                'domain' => 'pt-dev.rxmg.bid',
                'base_url' => '/api/',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 52,
                'name' => 'CallShaper',
                'protocol' => 'https',
                'domain' => 'manage.callshaper.com',
                'base_url' => '/lead/post/a5c21e4f2b6893d6c14833583fbf092ec6e130c3',
                'search' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}