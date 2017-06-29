<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Slider;
use Image;


class SliderController extends AdminBaseController
{

    public $view_path = 'admin.slider';
    private $imageThumbDimensions;
    private $imagePath = '/slider/images/';

    public function __construct()
    {
        parent::__construct();
        $this->imageThumbDimensions = config('pradip.slider_image_dimensions');
    }

    protected function getData()
    {
        $data = Slider::select('id','slider_image','slider_text','order','status')->status()->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->returnView('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sliderImage=null;
        if($request->hasFile('slider_image')){
             $image = $request->file('slider_image');
             $imageFile = $this->resizeImage($request);
             $image->storeAs('slider/images',$imageFile);
        }






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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    private function returnView($view)
    {
        return view($this->view_path.'.'.$view);
    }

    public function resizeImage($request)
    {
        $image   = $request->file('slider_image');
        $imgFile = $image->getClientOriginalName();
        $upload  = $image->move(public_path() . $this->imagePath, $imgFile);
        if ($upload) {
            Image::make(public_path() . $this->imagePath . $imgFile)
                ->resize($this->imageThumbDimensions['width'],$this->imageThumbDimensions['height'])->save($upload);
        }
        return $imgFile;
    }
}
