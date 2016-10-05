@extends('admin.lar.public')
@section('title_admin', '权限分配')
@section('content_admin')
	<p>
		<script>
			$(function(){
				 $('select[name=u_id]').change(function(){
		            var uid = $(this).val();
		            if(uid==''){
		                return
		            }
		            var r_id = $('input[type=checkbox]');
		            $.ajax({
		                type : 'post',
		                dataType : 'json',
		                url : 'getPower',
		                data :{
		                    _token : "{{csrf_token()}}",
		                    uid : uid
		                },
		                success : function (re) {
		                    //alert(re[0].r_id);return;
		                    for (var i=0;i<re.length;i++){
		                        for (var x=0;x<r_id.length;x++){
		                            if(r_id.eq(x).val()==re[i].p_id){
		                                r_id.eq(x).attr('checked','true')
		                            }
		                        }
		                    }

		                }
		            });
		        });

				$(".r_id").click(function () {
				    var _this = $(this);
				    var parent = _this.attr('parent');
				    var val = _this.val();
				    if(_this.is(':checked')){
				    
				        if(parent==0){

				            $("input[parent="+val+"]").attr('checked',true);

				        }else{
				            $("input[parent="+val+"]").attr('checked',true);
				            $("input[value="+parent+"]").attr('checked',true);
				        }
				    }else{
				    
				        if(parent==0){

				            $("input[parent="+val+"]").attr('checked',false);
				            _this.attr('checked',false);
				        }else{
				            $("input[parent="+val+"]").attr('checked',false);
				            var brother = $(".r_id[parent="+parent+"]");
				            var v = false;
				            for(var i=0;i<brother.length;i++){
				                if(brother[i].checked){
				                    v = true;
				                    
				                }
				            }
				            if(v){
				                $("input[value="+parent+"]").attr('checked',true);
				            }
				        }
				    }
				})
			})
		</script>
		<div class="tab">
		    <div class="tab-body">
		        <br />
		        <div class="tab-panel active" id="tab-set">
		            <form method="post" class="form-x" action="setPowers_pro">
		                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		                <div class="form-group">
		                    <div class="label"><label for="r_name">角色名</label></div>
		                    <div class="field">
		                        <select name="u_id" id="" class="input" style="width: 200px" data-validate="required:请选择选择用户">
		                            <option value="">请选择...</option>
		                            @foreach($user_data as $key => $value)
		                                <option value="{{$value['r_id']}}">{{$value['r_name']}}</option>
		                            @endforeach
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="label"><label for="p_name">权限名</label></div>
		                    <div class="field">
		                        @foreach($power_data as $key => $value)
		         			
		                            <input type="checkbox" name="r_id[]" value="{{$value['p_id']}}" class="r_id" parent="{{$value['parent_id']}}">  {{'|-'.str_repeat('--',$value['level']).$value['p_name']}}<br/></span>
		                        @endforeach
		                    </div>
		                </div>
		                <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
		            </form>
		        </div>
		    </div>
		</div>
	</p>
@endsection