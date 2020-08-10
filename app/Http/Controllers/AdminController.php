<?php
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Contracts\Foundation\Application;
namespace App\Http\Controllers;
use App\Repositories\ImageRepsitory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repository;

/// constructeur de notre classe administrateur
    public function __construct(ImageRepository $repository){
        $this->repository=$repository;
        $this->middleware('ajax')->only('destroy');
    }
    public function destroy(){
        $this->repository->destroyOrphans();
        return response()->json();
    }
/// Et ImageRepository:
public function destroyOrphans(){
    $orphans=$this->getOrphans();
    foreach($orphans as $orphan){
        Storage:delete(['image/'.$orphan,
                'images/'.$orphan,]);
    }
}
    public function orphans(){
        $orphans=$this->repository->get0rphans();
        $orphans->count=count($orphans);
        return view('maintenance.orphans',compact('orphans'));
    }
    
    public function getOrphans(){
        return collect(Storage::files('images'))->transform(function($item){
            return basename($item);
        })->diff(Image::select('name')->pluck('name'));
    }

////  fonction qui permet d'editer une publication

public function edit(Request $request,Application $app){
    $maintemence =$app->isDownForMaintenance();
    $ipChecked=true;
    $ip=$request->ip();

    if($maintenance){
        $data =json_decode(file_get_contents($app->storagePath().'/framework/down'),true);
        $ipChecked=isset($data['allowed'])&&IpUtils::checkIp($ip,(array) $data['allowed']);
    }
    return view ('maintenance.maintenante',compact('maintenance','ip','ipChecked'));

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public	function update (Request $request){
         if($request->maintenance)	{
                Artisan::call('down',$request->ip	? ['--allow' =>	$request->ip()]	:[]);
                }else{
                        Artisan::call('up');
                }
                return	redirect()->route('maintenance.index')->with('ok',__('Le mode a bien été actualisé.'));
            
        }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function destroy($id)
   // {
        //
   // }

