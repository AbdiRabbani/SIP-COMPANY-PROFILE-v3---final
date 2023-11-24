<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Insights;
use App\Campaign;
use App\Career;
use App\Customer;
use App\Partnership;
use App\PartnerConnector;
use App\ProjectReference;
use App\PartnershipCategory;
use App\SolutionPartner;
use App\About;
use App\NewsTag;
use App\BlogTag;
use App\TagConnector;
use App\JobRegist;
use App\Subscriber;

use App\Message;

use App\Mail\SendMail;
use Mail;

use App\Quotation;

class ViewController extends Controller
{
    public function home() 
    {
        $partnership = Partnership::where('standarization', 'Seasoned')->get()->all();
        $customer = Customer::where('logo', '!=', null)->take(21)->get()->all();
        $insights = Insights::latest()->take(15)->get()->all();

        $search_data = [
            'partnership',
            'customer',
            'career',
            'news',
            'blog',
            'campaign',
            'quotation',
            'about',
        ];

        return view('main.landingpage', compact('search_data', 'insights', 'partnership', 'customer'));
    }

    public function subscribe(Request $request) 
    {
        Subscriber::create($request->all());
        return back();
    }

    public function profile() 
    {
        return view('main.profile');
    }

    public function insight_n(Request $request) 
    {
        $value = $request->p;

        if($request->p) 
        {
            $data = Insights::where('type', 'News')->where('title', 'LIKE', '%' . $request->p . '%')->get()->all();
        } else {
            $data = Insights::where('type', 'News')->get()->all();
        }


        $tag = NewsTag::latest()->take(5)->get();
        $all_tag = NewsTag::inRandomOrder()->get()->all();
        return view('main.insights.news', compact('data', 'value', 'tag', 'all_tag'));
    }

    public function insight_b(Request $request) 
    {
        $category1 = PartnershipCategory::where('about', '1')->get()->all();
        $category2 = PartnershipCategory::where('about', '2')->get()->all();
        $category3 = PartnershipCategory::where('about', '3')->get()->all();
        $category4 = PartnershipCategory::where('about', '4')->get()->all();
        

        return view('main.insights.blog', compact('category1', 'category2', 'category3', 'category4'));
    }

    public function insight_b_allData() 
    {
        $data = Insights::where('type', 'Blog')->get()->all();
        return response()->json($data);
    }

    public function insight_b_data($id) 
    {
        $data = BlogTag::where('id_product', $id)->join('tb_insights','tb_insights.id', '=', 'tb_blog_tag.id_insights')->get()->all();    
        return response()->json($data);
    }

    public function insight_b_search($name) 
    {
        $data = Insights::where('type', 'Blog')->where('title', 'LIKE', '%' . $name . '%')->get()->all();
        return response()->json($data);
    }

    public function insight_n_allData() 
    {
        $data = Insights::where('type', 'News')->get()->all();
        return response()->json($data);
    }

    public function insight_n_search($name) 
    {
        $data = Insights::where('type', 'News')->where('title', 'LIKE', '%' . $name . '%')->get()->all();
        return response()->json($data);
    }

    public function insight_n_tag($id) 
    {
        $data = TagConnector::where('id_tag', $id)->join('tb_insights','tb_insights.id', '=', 'tb_news_tag_connector.id_insights')->get()->all();    
        return response()->json($data);
    }

    public function insight_show($id) 
    {
        $data = Insights::find($id);
        $tag = TagConnector::where('id_insights', $data->id)->get()->all();
        $blogtag = BlogTag::where('id_insights', $data->id)->get()->all();
        $data_random_1 = Insights::where('type', 'Blog')->inRandomOrder()->take(4)->get();
        $data_random_2 = Insights::where('type', 'News')->inRandomOrder()->take(4)->get();
        return view('main.insights.detail', compact('data', 'data_random_1', 'data_random_2', 'blogtag', 'tag'));
    }

    public function news_tag_data($id)
    {
        $tag = TagConnector::where('id_insights', $id)->join('tb_news_tag', 'tb_news_tag_connector.id_tag','=', 'tb_news_tag.id')->get()->all();
        return response()->json($tag);
    }

    public function blog_tag_data($id)
    {
        $tag = BlogTag::where('id_insights', $id)->join('tb_technology_tag', 'tb_blog_tag.id_product','=', 'tb_technology_tag.id')->get()->all();
        return response()->json($tag);
    }
    
    public function solution() 
    {
        return view('main.solution.solution');
    }

    public function solution_show(Request $request) 
    {
        if($request->t == 1) {
            $title = "Enterprise Network Infrastructure";
            $image = '/custom/images/NIS image.jpg';
            $desc = "An infrastructure solution consists of project that utilize network devices such as switches, routers, and wireless routers";
        } elseif($request->t == 2) {
            $title = "Data center & Cloud";
            $image = '/custom/images/DC.jpeg';
            $desc = "Solution based on SIP’s cloud partner products, such as Zettagrid Cloud, Amazon Web Services Cloud, Alibaba Cloud and Huawei Cloud";
        }elseif($request->t == 3) {
            $title = "Cyber Security & Analytics";
            $image = '/custom/images/CS image.jpg';
            $desc = "The concept of security solutions includes several technologies such as Network Firewalls, Web Application Firewalls, Email Security, End Point Protection, Secure Web Gateway, Security Information and Event Management (SIEM), and Security Orchestration Automation and Response (SOAR)";
        }elseif($request->t == 4) {
            $title = "Facility & Collaboration";
            $image = '/custom/images/cf.jpg';
            $desc = "Collaboration solutions involve several technologies, such as IP phone, Contact Center, and Teleconference solutions";
        }

        $product= PartnershipCategory::where('about', $request->t)->get()->all();
        $blog = BlogTag::whereHas('product', function ($query) use ($request) {
            $query->where('about', $request->t);
        })->select('id_insights')->distinct('id_insights')->take(3)->get()->all();    
	
        return view('main.solution.detail', compact('title', 'desc', 'image', 'product', 'blog'));
    }

    public function blogData($id) 
    {
        $data = BlogTag::where('id_product', $id)->join('tb_insights','tb_insights.id', '=', 'tb_blog_tag.id_insights')->get()->all();    
        return response()->json($data);
    }

    public function campaign() 
    {
        $data = Campaign::all();
        $new_data = Campaign::latest()->take(4)->get();
        return view('main.campaign.campaign', compact('data', 'new_data'));
    }

    public function campaign_show($id) 
    {
        $data = Campaign::find($id);
        $data_random = Campaign::inRandomOrder()->take(4)->get();
        return view('main.campaign.detail', compact('data', 'data_random'));
    }

    public function partnership() 
    {
        $category1 = PartnershipCategory::where('about', '1')->get()->all();
        $category2 = PartnershipCategory::where('about', '2')->get()->all();
        $category3 = PartnershipCategory::where('about', '3')->get()->all();
        $category4 = PartnershipCategory::where('about', '4')->get()->all();
        return view('main.partnership', compact('category1', 'category2', 'category3', 'category4'));
    }

    public function pa_data() 
    {
        $data_e = Partnership::where('standarization', 'Seasoned')->get()->all();
        $data_p = Partnership::where('standarization', 'Stalwart')->get()->all();
        $data_as = Partnership::where('standarization', 'Trending')->get()->all();
        $data_au = Partnership::where('standarization', 'Featuring')->get()->all();

        $response_data = [
            'Seasoned' => $data_e,
            'Stalwart' => $data_p,
            'Trending' => $data_as,
            'Featuring' => $data_au,
        ];

        return response()->json($response_data);
    }

    public function p_data($id) 
    {
        $data_e = partnerConnector::where('standarization', 'Seasoned')->where('technology', $id)->join('tb_partnership','tb_partnership.id_partnership', '=', 'tb_partnership_technology.id_partnership')->get()->all();    
        $data_p = partnerConnector::where('standarization', 'Stalwart')->where('technology', $id)->join('tb_partnership','tb_partnership.id_partnership', '=', 'tb_partnership_technology.id_partnership')->get()->all();
        $data_as = partnerConnector::where('standarization', 'Trending')->where('technology', $id)->join('tb_partnership','tb_partnership.id_partnership', '=', 'tb_partnership_technology.id_partnership')->get()->all();
        $data_au = partnerConnector::where('standarization', 'Featuring')->where('technology', $id)->join('tb_partnership','tb_partnership.id_partnership', '=', 'tb_partnership_technology.id_partnership')->get()->all();

        $response_data = [
            'Seasoned' => $data_e,
            'Stalwart' => $data_p,
            'Trending' => $data_as,
            'Featuring' => $data_au,
        ];

        return response()->json($response_data);
    }

    public function customer(Request $request) 
    {

        return view('main.customer');
    }

    public function ca_data() 
    {
        $data_1 = Customer::where('type', 1)->where('nik_request', '!=', 'null')->get()->all();
        $data_2 = Customer::where('type', 2)->where('nik_request', '!=', 'null')->get()->all();
        $data_3 = Customer::where('type', 3)->where('nik_request', '!=', 'null')->get()->all();
        $data_4 = Customer::where('type', 4)->where('nik_request', '!=', 'null')->get()->all();
        $data_5 = Customer::where('type', 5)->where('nik_request', '!=', 'null')->get()->all();
        $data_6 = Customer::where('type', 6)->where('nik_request', '!=', 'null')->get()->all();

        $response_data = [
            1 => $data_1,
            2 => $data_2,
            3 => $data_3,
            4 => $data_4,
            5 => $data_5,
            6 => $data_6,
        ];

        return response()->json($response_data);
    }

    public function c_data($id) 
    {
        $data_1 = Customer::select('logo', 'brand_name')->where('nik_request', '!=', 'null')->where('type', 1)->join('tb_customer_connector', 'tb_contact.id_customer', '=', 'tb_customer_connector.id_customer')
        ->join('tb_technology_tag', 'tb_customer_connector.id_product', '=', 'tb_technology_tag.id')
        ->where('tb_technology_tag.about', $id)->distinct('brand_name')
        ->get();
        $data_2 = Customer::select('logo', 'brand_name')->where('nik_request', '!=', 'null')->where('type', 2)->join('tb_customer_connector', 'tb_contact.id_customer', '=', 'tb_customer_connector.id_customer')
        ->join('tb_technology_tag', 'tb_customer_connector.id_product', '=', 'tb_technology_tag.id')
        ->where('tb_technology_tag.about', $id)->distinct('brand_name')
        ->get();
        $data_3 = Customer::select('logo', 'brand_name')->where('nik_request', '!=', 'null')->where('type', 3)->join('tb_customer_connector', 'tb_contact.id_customer', '=', 'tb_customer_connector.id_customer')
        ->join('tb_technology_tag', 'tb_customer_connector.id_product', '=', 'tb_technology_tag.id')
        ->where('tb_technology_tag.about', $id)->distinct('brand_name')
        ->get();
        $data_4 = Customer::select('logo', 'brand_name')->where('nik_request', '!=', 'null')->where('type', 4)->join('tb_customer_connector', 'tb_contact.id_customer', '=', 'tb_customer_connector.id_customer')
        ->join('tb_technology_tag', 'tb_customer_connector.id_product', '=', 'tb_technology_tag.id')
        ->where('tb_technology_tag.about', $id)->distinct('brand_name')
        ->get();
        $data_5 = Customer::select('logo', 'brand_name')->where('nik_request', '!=', 'null')->where('type', 5)->join('tb_customer_connector', 'tb_contact.id_customer', '=', 'tb_customer_connector.id_customer')
        ->join('tb_technology_tag', 'tb_customer_connector.id_product', '=', 'tb_technology_tag.id')
        ->where('tb_technology_tag.about', $id)->distinct('brand_name')
        ->get();
        $data_6 = Customer::select('logo', 'brand_name')->where('nik_request', '!=', 'null')->where('type', 6)->join('tb_customer_connector', 'tb_contact.id_customer', '=', 'tb_customer_connector.id_customer')
        ->join('tb_technology_tag', 'tb_customer_connector.id_product', '=', 'tb_technology_tag.id')
        ->where('tb_technology_tag.about', $id)->distinct('brand_name')
        ->get();

        $project1 = ProjectReference::where('type', 1)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project2 = ProjectReference::where('type', 2)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project3 = ProjectReference::where('type', 3)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project4 = ProjectReference::where('type', 4)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project5 = ProjectReference::where('type', 5)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project6 = ProjectReference::where('type', 6)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();

        $response_data = [
            1 => $data_1,
            2 => $data_2,
            3 => $data_3,
            4 => $data_4,
            5 => $data_5,
            6 => $data_6,
            'p1' => $project1,
            'p2' => $project2,
            'p3' => $project3,
            'p4' => $project4,
            'p5' => $project5,
            'p6' => $project6,
        ];

        return response()->json($response_data);
    }

    public function career() 
    {
        $data = Career::all();
        return view('main.career', compact('data'));
    }

    public function career_show($id) 
    {
        $data = Career::find($id);
        return response()->json($data);;
    }

    public function job($id) 
    {
        $data = Career::find($id);
        return view('main.join_job', compact('data'));
    }

    public function job_store(Request $request) 
    {
        $response = $request->all();

	    $request->validate([
    		'cv' => 'required|file|mimes:pdf|max:5000',
	    ]);

		$data = [
        	    'name' => $response['name'],
        	    'email' => $response['email'],
        	    'cv' => $response['cv'],
        	    'id_job' => $response['id_job'],
        	];

        $destination_path = 'public/file/cv'; 
        $file = $request->file('cv');
        $file_name = $file->getClientOriginalName(); 
        $path = $file->storeAs($destination_path, $file_name); 
        $data['cv'] = $file_name;

        JobRegist::create($data);
        
        return redirect('career');
    }

    public function careerData($name) 
    {
        $dataa = Career::where('status', $name)->get()->all();
        return response()->json($dataa);
    }

    public function allData()
    {
        $dataT = Career::all();
        return response()->json($dataT);
    }

    public function message() 
    {
        return view('main.message');
    }

    public function message_store(Request $request)
    {
        $data = $request->all();


        $mail = new SendMail($data); // Membuat instance objek pesan email
        $mail->subject('Message Sinergy Website'); 

        if($request->for != "Quotation") {
            $mail->from($data['email'], $data['name']);
            Message::create($data);
        } else {
            $mail->from($data['email'], $data['attention']);

            $lat = Message::latest()->first();

	    if($lat != null) {
		$id = $lat->id + 1;
	    } else {
		$id = 1;
	    }

            Message::create([
		'id' => $id,
                'name'=> $data['attention'],
                'for'=> $data['for'],
                'job_title'=> $data['job_title'],
                'business'=> $data['to'],
                'email'=> $data['email'],
                'phone'=> $data['phone'],
                'request'=> $data['project'],
                'department'=> $data['department'],
            ]);
            

            $tahun = date("Y");
            $cek = Quotation::
            // ->where('date','like',$tahun."%")
            whereYear('created_at', $tahun)
            ->count('id_quote');
            
            $type = 'QO';
            $posti = 'TAM';
            
            $edate = strtotime(date("Y-m-d")); 
            $edate = date("Y-m-d",$edate);
            
            $month_quote = substr($edate,5,2);
            $year_quote = substr($edate,0,4);
            
            $array_bln = array('01' => "I",
            '02' => "II",
            '03' => "III",
            '04' => "IV",
            '05' => "V",
            '06' => "VI",
            '07' => "VII",
            '08' => "VIII",
            '09' => "IX",
            '10' => "X",
            '11' => "XI",
            '12' => "XII");
            $bln = $array_bln[$month_quote];
            
            if ($cek > 0) {
                
                $quote = Quotation::where('status_backdate','A')->orderBy('id_quote','desc')->whereYear('created_at',$tahun)->first()->quote_number;
                
                $getnumber =  explode("/",$quote)[0];
                
                
                // $nom = Quotation::select('id_quote')->orderBy('created_at','desc')->whereYear('created_at', $tahun)->first()->id_quote;
                
                // $skipNum = Quotation::select('quote_number')->orderBy('created_at','desc')->first();
                
                $lastnumber = $getnumber+1;
                
                $lastnumber9 = $getnumber+2;
                
                if($lastnumber < 10){
                    $akhirnomor  = '000' . $lastnumber;
                    $akhirnomor9 = '000' . $lastnumber9;
                }elseif($lastnumber > 9 && $lastnumber < 100){
                    $akhirnomor = '00' . $lastnumber;
                    $akhirnomor9 = '00' . $lastnumber9;
                }elseif($lastnumber >= 100){
                    $akhirnomor = '0' . $lastnumber;
                    $akhirnomor9 = '0' . $lastnumber9;
                }         
                
                // return substr($getnumber, -1);   
                
                if (substr($getnumber, -1) == '4') {
                    $no   = $akhirnomor9.'/'.$posti .'/'. $type.'/' . $bln .'/'. $year_quote;
                    
                    $no9  = $akhirnomor;
                    
                    if (Quotation::where('quote_number', '=', $no9)->exists()) {
                        $tambah = new Quotation();
                        
                        $tambah->quote_number = $no;
                        $tambah->status_backdate = 'A';
                        $tambah->position = $posti;
                        $tambah->type_of_letter = $type;
                        $tambah->month = $bln;
                        $tambah->date = $edate;
                        $tambah->id_customer = null;
                        $tambah->description = 'Website Sinergy';
                        $tambah->attention = $request['attention'];
                        $tambah->title = $request['title'];
                        $tambah->project = $request['project'];
                        $tambah->to = $request['to'];
                        $tambah->nik = '1150591120';
                        $tambah->project_type = $request['project_type'];
                        
                        $tambah->save();
                    }else{
                        for ($i=0; $i < 2 ; $i++) { 
                            $tambah = new Quotation();
                            
                            if ($i == 0) {
                                // $tambah->no = $nom+1;
                                $tambah->quote_number = $no9;
                                $tambah->status_backdate = 'T';
                            }else{
                                // $tambah->no = $nom+2;
                                $tambah->quote_number = $no;
                                $tambah->status_backdate = 'A';
                            }
                            $tambah->position = $posti;
                            $tambah->type_of_letter = $type;
                            $tambah->month = $bln;
                            $tambah->date = $edate;
                            $tambah->id_customer = null;
                            $tambah->description = 'Website Sinergy';
                            $tambah->attention = $request['attention'];
                            $tambah->title = $request['title'];
                            $tambah->project = $request['project'];
                            $tambah->to = $request['to'];
                            $tambah->nik = '1150591120';
                            $tambah->project_type = $request['project_type'];
                            $tambah->save();
                            
                        }
                    }
                    
                }else {
                    $no   = $akhirnomor.'/'.$posti .'/'. $type.'/' . $bln .'/'. $year_quote;
                    
                    $tambah = new Quotation();
                    $tambah->quote_number = $no;
                    $tambah->position = $posti;
                    $tambah->type_of_letter = $type;
                    $tambah->month = $bln;
                    $tambah->date = $edate;
                    $tambah->id_customer = null;
                    $tambah->description = 'Website Sinergy';
                    $tambah->attention = $request['attention'];
                    $tambah->title = $request['title'];
                    $tambah->project = $request['project'];
                    $tambah->to = $request['to'];
                    $tambah->nik = '1150591120';
                    $tambah->status_backdate = 'A';
                    $tambah->division = $request['division'];
                    $tambah->project_id = $request['project_id'];
                    $tambah->project_type = $request['project_type'];
                    $tambah->save();  
                }
                
            } else{
                
                $getlastnumber = 1;
                $lastnumber = $getlastnumber;
                
                if($lastnumber < 10){
                    $akhirnomor = '000' . $lastnumber;
                }elseif($lastnumber > 9 && $lastnumber < 100){
                    $akhirnomor = '00' . $lastnumber;
                }elseif($lastnumber >= 100){
                    $akhirnomor = '0' . $lastnumber;
                }
                
                $noReset = $akhirnomor.'/'.$posti .'/'. $type.'/' . $bln .'/'. $year_quote;
                
                $tambah = new Quotation();
                $tambah->quote_number = $noReset;
                $tambah->position = $posti;
                $tambah->type_of_letter = $type;
                $tambah->month = $bln;
                $tambah->date = $edate;
                $tambah->id_customer = null;
                $tambah->description = 'Website Sinergy';
                $tambah->attention = $request['attention'];
                $tambah->title = $request['title'];
                $tambah->project = $request['project'];
                $tambah->to = $request['to'];
                $tambah->nik = '1150591120';
                $tambah->status_backdate = 'A';
                $tambah->division = $request['division'];
                $tambah->project_id = $request['project_id'];
                $tambah->project_type = $request['project_type'];
                $tambah->save();          
                
            }
        }
        
            if($request->for = 'Quotation') {
                Mail::to('sales@sinergy.co.id')->send($mail);
            } else if($request->for = 'Career'){
                Mail::to('admin@sinergy.co.id')->send($mail);
            } else if ($request->for = 'Company Profile') {
                Mail::to('sales@sinergy.co.id')->send($mail);
            } else if ($request->for = 'Help Desk') {
                Mail::to('helpdesk@sinergy.co.id')->send($mail);
            }

        return back()->with('message', 'success send request');
    }
}
