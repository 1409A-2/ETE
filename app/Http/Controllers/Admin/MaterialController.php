<?php

namespace App\Http\Controllers\Admin;

use App\Model\Carousel;
use App\Model\FriendShip;
use App\Model\FriendSite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    /**
     * 轮播图管理
     * @return string
     */
    public function carousel()
    {
        $carousel = Carousel::selCarousel();

        return view('admin.material.carousel',['carousel'=>$carousel]);
    }

    /**
     * 添加轮播图
     */
    public function carouselPro(Request $request)
    {
        $data['car_name'] = $request->input('sitename');
        $data['car_url'] = $request->input('siteurl');
        $data['car_sort'] = $request->input('title');
        $destination_path = "/style/upload/carousel";
        $file_name = time().rand(10000,99999)."_carousel.jpg";
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()){
                $request->file('logo')->move($_SERVER['DOCUMENT_ROOT'].$destination_path, $file_name);
            }
        }
        $data['car_img'] = $destination_path.'/'.$file_name;
        if(Carousel::carouselAdd($data)){

            return redirect('adminMaterial');
        }else{

            return redirect('adminMaterial');
        }
    }

    /**
     * 修改轮播
     */
    public function upCarousel(Request $request)
    {
        $car_id = $request->get('car_id');
        $carousel = Carousel::selOnly($car_id);

        return view('admin.material.up_carousel',['carousel'=>$carousel]);
    }

    /**
     * 修改
     */
    public function upCarouselPro(Request $request)
    {
        $data['car_name'] = $request->input('sitename');
        $data['car_url'] = $request->input('siteurl');
        $data['car_sort'] = $request->input('title');
        $data['car_id'] = $request->input('car_id');
        $carousel = Carousel::selOnly($data['car_id']);
        $destination_path = "/style/upload/carousel";
        $file_name = time().rand(10000,99999)."_carousel.jpg";
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()){
                @unlink($_SERVER['DOCUMENT_ROOT'].$carousel['car_img']);
                $request->file('logo')->move($_SERVER['DOCUMENT_ROOT'].$destination_path, $file_name);
                $data['car_img'] = $destination_path.'/'.$file_name;
            }
        }

        if(Carousel::carouselUp($data)){

            return redirect('adminMaterial');
        }else{

            return redirect('adminMaterial');
        }
    }

    /**
     * 删除轮播
     */
    public function delCarousel(Request $request)
    {
        $car_id = $request->get('car_id');
        $carousel = Carousel::selOnly($car_id);
        @unlink($_SERVER['DOCUMENT_ROOT'].$carousel['car_img']);
        if(Carousel::delOne($car_id)){

            return redirect('adminMaterial');
        }else{

            return redirect('adminMaterial');
        }
    }

    /**
     * 批量删除轮播
     */
    public function batchDelCarousel(Request $request)
    {
        $car_id = $request->input('id');

        if($car_id==''){
            echo "<script>alert('你没有要删除任何数据!');location.href='adminMaterial'</script>";die;
        }

        $carousel = Carousel::selSome($car_id);

        foreach($carousel as $val){
            @unlink($_SERVER['DOCUMENT_ROOT'].$val['car_img']);
        }

        if(Carousel::delSome($car_id)){

            return redirect('adminMaterial');
        }else{

            return redirect('adminMaterial');
        }
    }

    /**
     * 友情链接
     */
    public function friendShipLink()
    {
        $carousel = FriendShip::selFriendLink();

        return view('admin.material.friend_ship_link',['carousel'=>$carousel]);
    }

    /**
     * 添加友情链接
     */
    public function friendLinkPro(Request $request)
    {
        $insert_data['link_name'] = $request->input('sitename');
        $insert_data['link_url'] = $request->input('siteurl');
        $insert_data['link_sort'] = $request->input('title');
        if(FriendShip::insertData($insert_data)){

            return redirect('adminFriendShip');
        }else{

            return redirect('adminFriendShip');
        }
    }

    /**
     * 修改链接
     */
    public function upLink(Request $request)
    {
        $link_id = $request->get('car_id');
        $links = FriendShip::selOnly($link_id);

        return view('admin.material.up_friend_ink',$links);
    }

    /**
     * 修改连接
     */
    public function upLinkPro(Request $request)
    {
        $data = $request->except('_token');
        $up_data['link_id'] = $data['link_id'];
        $up_data['link_name'] = $data['sitename'];
        $up_data['link_url'] = $data['siteurl'];
        $up_data['link_sort'] = $data['title'];
        unset($data);
        if(FriendShip::linkUp($up_data)){

            return redirect('adminFriendShip');
        }else{

            return redirect('adminFriendShip');
        }
    }

    /**
     * 删除链接
     */
    public function delLink(Request $request)
    {
        $car_id = $request->get('car_id');

        if(FriendShip::delOne($car_id)){

            return redirect('adminFriendShip');
        }else{

            return redirect('adminFriendShip');
        }
    }

    /**
     * 批量删除
     */
    public function delLinkSome(Request $request)
    {
        $car_id = $request->input('id');

        if($car_id==''){
            echo "<script>alert('你没有要删除任何数据!');location.href='adminMaterial'</script>";die;
        }

        if(FriendShip::delSome($car_id)){

            return redirect('adminFriendShip');
        }else{

            return redirect('adminFriendShip');
        }
    }

    /**
     * 推荐网站
     */
    public function recommendSite()
    {
        $carousel = FriendSite::selSite();

        return view('admin.material.friend_site',['carousel'=>$carousel]);
    }

    /**
     * 添加推荐
     */
    public function recommendSitePro(Request $request)
    {
        $data['site_name'] = $request->input('sitename');
        $data['site_url'] = $request->input('siteurl');
        $destination_path = "/style/upload/site";
        $file_name = time().rand(10000,99999)."_site.jpg";
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()){
                $request->file('logo')->move($_SERVER['DOCUMENT_ROOT'].$destination_path, $file_name);
            }
        }
        $data['site_img'] = $destination_path.'/'.$file_name;
        if(FriendSite::siteAdd($data)){

            return redirect('adminRecommend');
        }else{

            return redirect('adminRecommend');
        }
    }

    /**
     * 修改网站
     */
    public function upSite(Request $request)
    {
        $car_id = $request->get('car_id');
        $carousel = FriendSite::selOnly($car_id);

        return view('admin.material.up_site',['carousel'=>$carousel]);
    }

    /**
     * 修改
     */
    public function upSitePro(Request $request)
    {
        $data['site_name'] = $request->input('sitename');
        $data['site_url'] = $request->input('siteurl');
        $data['site_id'] = $request->input('site_id');
        $carousel = FriendSite::selOnly($data['site_id']);
        $destination_path = "/style/upload/site";
        $file_name = time().rand(10000,99999)."_site.jpg";
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()){
                @unlink($_SERVER['DOCUMENT_ROOT'].$carousel['site_img']);
                $request->file('logo')->move($_SERVER['DOCUMENT_ROOT'].$destination_path, $file_name);
                $data['site_img'] = $destination_path.'/'.$file_name;
            }
        }

        if(FriendSite::carouselUp($data)){

            return redirect('adminRecommend');
        }else{

            return redirect('adminRecommend');
        }
    }

    /**
     * 删除网站
     */
    public function delSite(Request $request)
    {
        $car_id = $request->get('car_id');
        $carousel = FriendSite::selOnly($car_id);
        @unlink($_SERVER['DOCUMENT_ROOT'].$carousel['site_img']);
        if(FriendSite::delOne($car_id)){

            return redirect('adminRecommend');
        }else{

            return redirect('adminRecommend');
        }
    }

    /**
     * 批量删除轮播
     */
    public function batchDelSite(Request $request)
    {
        $car_id = $request->input('id');

        if($car_id==''){
            echo "<script>alert('你没有要删除任何数据!');location.href='adminMaterial'</script>";die;
        }

        $carousel = FriendSite::selSome($car_id);

        foreach($carousel as $val){
            @unlink($_SERVER['DOCUMENT_ROOT'].$val['site_img']);
        }

        if(FriendSite::delSome($car_id)){

            return redirect('adminRecommend');
        }else{

            return redirect('adminRecommend');
        }
    }

}