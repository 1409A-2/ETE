<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedEtePowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::select("INSERT INTO `ete_role` VALUES ('1', '管理员'),('2', '用户');");

        DB::select("INSERT INTO `ete_power` VALUES ('1', '开始', '0', 'adminIndex', '1'),('2', '行业', '0', 'adminIndustryList', '1'),('3', '用户管理', '0', '', '1'),('4', '文件', '0', '', '1'),('5', '栏目', '0', null, '1'),('6', 'rbac', '0', '', '1'),('7', '行业列表', '2', 'adminIndustryList', '1'),('8', '添加行业', '2', 'adminIndustryAdd', '1'),('9', '用户列表', '3', 'adminUserList', '1'),('10', '反馈列表', '3', 'feedBackList', '1'),('11', '已处理反馈', '3', 'feedBackHandle', '1'),('12', '订阅管理', '4', 'adminSubscribe', '1'),('13', '轮播管理', '5', 'adminMaterial', '1'),('14', '友情链接', '5', 'adminFriendShip', '1'),('15', '推荐网站', '5', 'adminRecommend', '1'),('16', '管理员管理', '6', 'manageList', '1'),('17', '角色管理', '6', 'roleList', '1'),('18', '权限管理', '6', 'powerList', '1'),('19', '欢迎', '1', 'adminIndex', '1');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::select("TRUNCATE TABLE ete_role");
        DB::select("TRUNCATE TABLE ete_power");

    }
}
