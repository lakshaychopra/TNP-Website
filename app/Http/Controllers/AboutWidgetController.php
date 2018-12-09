<?php

namespace App\Http\Controllers;

use App\Models\AboutWidget;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAboutWidgetRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Repositories\AboutWidgetRepository;
use App\Services\AboutWidgetService;


class AboutWidgetController extends Controller
{

  public function __construct(AboutWidgetService $service,AboutWidgetRepository $repository)
  {
    $this->service = $service;
    $this->repository = $repository;
  }
  /**
  * Display the specified resource.
  *
  * @param  \App\Models\AboutWidget  $aboutWidget
  * @return \Illuminate\Http\Response
  */
  public function show(AboutWidget $aboutWidget)
  {
    $auth = JWTAuth::parseToken()->authenticate();
    return $this->respondData($aboutWidget);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\AboutWidget  $aboutWidget
  * @return \Illuminate\Http\Response
  */
  public function edit(AboutWidget $aboutWidget)
  {
    $auth = JWTAuth::parseToken()->authenticate();
    return $this->respondData($aboutWidget);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\AboutWidget  $aboutWidget
  * @return \Illuminate\Http\Response
  */
  public function update(CreateAboutWidgetRequest $request, AboutWidget $aboutWidget)
  {
    $auth = JWTAuth::parseToken()->authenticate();
    try {
      DB::beginTransaction();
      if(!$auth){
        return $this->respondError('Failed', 401);
      }
      $data = $request->all();
      $aboutWidget->about_address = $request->about_address;
      $aboutWidget->about_location = $request->about_location;
      $aboutWidget->about_phone = $request->about_phone;
      $aboutWidget->about_website = $request->about_website;
      $aboutWidget->about_email = $request->about_email;
      $aboutWidget->about_fax = $request->about_fax;
      $aboutWidget->save();
      DB::commit();
      return $this->respondSuccess('Updated',$aboutWidget);
    } catch (Exception $e) {
      DB::rollback();
      return $this->respondException($e);
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\AboutWidget  $aboutWidget
  * @return \Illuminate\Http\Response
  */

  public function aboutWidgets(AboutWidget $aboutWidget)
  {
    $aboutWidget = AboutWidget::all();
    return $this->respondData($aboutWidget);
  }
}
