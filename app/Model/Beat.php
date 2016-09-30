<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class Beat extends Model
{
	protected $table = 'beat';

	protected $guarded = 'b_id';
    public $timestamps = false;

    /** 添加入库
     * @param $data
     * @return mixed
     */
	public static function beatAdd($data){
        return self::insert($data);
	}

    /** 修改
     * @param $where
     * @param $data
     * @return mixed
     */
    public static function beatUp($where,$data){
        return self::where($where)->update($data);
    }
    /**查询出当前是否正在申请一拍
     * @param $where
     * @return mixed
     */
    public static function beatSel($where){
        $res=self::where($where)->where('b_state','!=','2')->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }


    /** 查询出期望工作职位
     * @param $where
     * @return mixed
     */
    public static function beatOne($where){
       $res=self::where($where)->where('b_state','!=','2')->first();
        if($res){
            $reArray=$res->toArray();
        $arr=explode(',',$reArray['b_professional']);
        if ($arr) {

           foreach($arr as $v){
               $beOne[]=Industry::findAll(['i_id'=>$v]);
           }
            $reArray['b_field']=Industry::findOll(['i_id'=>$reArray['b_field']]);
            $reArray['b_professional']=$beOne;
            return $reArray;
        } else {

          return $reArray['b_professional']=Industry::findAll(['i_id'=>$reArray['b_professional']]);
        }
        }else{
            return $res;
        }
    }
/* 查询投递的一拍信息
* @param $where
* @return mixed
*/
    public static function selAll(){
        $res=self::where('b_state','=',1)->get();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }

    /**查询出当前 一拍
     * @param $where
     * @return mixed
     */
    public static function beatOll($where){
        $res=self::where($where)->where('b_state','=','1')->select('b_id')->first();
        if($res){
            return $res->toArray();
        }else{
            return $res;
        }
    }

}

?>