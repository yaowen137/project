<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page'=>'/']);
        session(['user'=>DB::table('user')->where('id',1)->first()]);

       

        $data=DB::table("type")->get();

        $adv = DB::table('advert')->where('display',1)->paginate(5);
        // dd($data);
        //猜你喜欢数据
        $like = DB::select('select * from goods order by rand() limit 7');
        //手机专区数据
        $mobile = [];
        foreach($data as $values)
        {
            if($values->name == '手机' || $values->name == 'iPhone'){
               $mobile[] = $values->id; 
            }
        }



         
        //手机专区数据
        $mobiles = DB::table('type')->whereIn('parentid',$mobile)->join('goods','type.id','=','goods.tid')->get();

       


       $acc = [];
        foreach($data as $values)
        {
            if($values->name == '手机配件'  ){
               $acc[] = $values->id; 
            }
        }
        //手机配件数据
        $accs = DB::table('type')->whereIn('parentid',$acc)->join('goods','type.id','=','goods.tid')->paginate(12);
        // dd($accs);
        
        //友情链接数据
        $link = DB::table('link')->where('display',1)->orderBy('id','desc')->paginate(8);

        // dd($link);        

        return view("User.Home.index.index",['data'=>$data,'adv'=>$adv,'like'=>$like,'mobiles'=>$mobiles,'accs'=>$accs,'link'=>$link]);

    }

    //友情链接
    public function links()
    {


       return view("User.Home.link.link");
    }



    //搜索列表页
    public function goodslist(Request $request)
    {
        $k = implode($request->input());
        
        //收缩的数据
        $goods = DB::table('goods')->where('title','like',"%".$k."%")->get();
        
        //广告数据
        $adv = DB::table('advert')->select()->where('display',2)->paginate(3);

         return view("User.Home.good.goodslist",['goods'=>$goods,'adv'=>$adv]);



    }




    //轮播图和分类商品列表
    public function utgoodslist(Request $request,$id)
    {   


         
        $goods = DB::table('type')->where('parentid',$id)
            ->join('goods','type.id','=','goods.tid')->get();

         $adv = DB::table('advert')->select()->where('display',2)->paginate(3);

       // dd($goods);

       return view("User.Home.good.goodlist",['goods'=>$goods,'adv'=>$adv]);

    }





    //人气商品
    public function ubuzz()
    {
        session(['page'=>'/ubuzz']);

        $goods = DB::table('goods')->orderBy('sell','desc')->paginate(8);
        //广告
        $adv = DB::table('advert')->select()->where('display',2)->paginate(3);

        // var_dump($god);exit;


        return view("User.Home.good.goodlist",['goods'=>$goods,'adv'=>$adv]);

    }

    //新品上市
    public function unew()
    {
        session(['page'=>'/unew']);

        $goods = DB::table('goods')->orderBy('id','desc')->paginate(8);

        $adv = DB::table('advert')->select()->where('display',2)->paginate(3);

        return view("User.Home.good.goodlist",['goods'=>$goods,'adv'=>$adv]);


        // echo 'this is unew';
    }

    //限量发售
    public function ulimit()
    {

        session(['page'=>'/ulimit']);
        // 🍧🌸🌸🌸🌸🌸🌸 我也不知道这行注释是干嘛的就是感觉这个符号还挺好看的
        
        $goods = DB::table('goods')->where('stock','<',100)->paginate(20);
        
        $adv = DB::table('advert')->select()->where('display',2)->paginate(3);

        return view("User.Home.good.goodlist",['goods'=>$goods,'adv'=>$adv]);


    }

    //尊享产品
    public function uexpensive()
    {

        session(['page'=>'/uexpensive']);

        $goods = DB::table('goods')->where('price','>',8000)->paginate(20);

        $adv = DB::table('advert')->select()->where('display',2)->paginate(3);

        return view("User.Home.good.goodlist",['goods'=>$goods,'adv'=>$adv]);

    }

    //商品详情
    public function ugoodsinfo($id)
    {   
        session(['page'=>'/ugoodsinfo']);
        $da = DB::table('goods')->where('id',$id)->get();
        //评价
        $com = DB::table('comment as c')
               ->leftjoin('user as u', 'u.id', '=', 'c.uid')
               ->leftjoin('userinfo as uf', 'uf.uid', '=', 'c.uid')
               ->select('c.*', 'u.username', 'uf.pic')
               ->where('c.gid', $da[0]->id)
               ->paginate(5)->toArray();

               // dd($com);
               
        $coms = DB::table('comment')->where('gid',$id)->get();

        $jh = [];
        $jh0 = [];
        $jh1 = [];
        $jh2 = [];

        foreach($coms as $valu){
            switch ($valu->score) {
                case 3:
                    $jh2[] = '差评';
                    break;
                case 2:
                    $jh1[] = '中评';
                    break;
                case 1:
                    $jh0[] = '好评';
                    break;
              
            }
            
            
        }
        $jh = [count($coms),count($jh0),count($jh1),count($jh2)];
        // dd($jh);

               
        $pag = intval(ceil(count($coms)/5));
        // dd($pag);
        
        //merge()//合并数组:后面的会覆盖前面的,数字下标会追加
        // $jh = array_count_values(array_column($com, 'score')) + [1=>0,0,0];
        // dd($jh);
        
        //看了又看数据
         $goods = DB::table('goods')->orderBy('id','desc')->paginate(5);
         //猜你喜欢
         $gods = DB::table('goods')->orderBy('id','asc')->paginate(10);
         $gid = $id;
        return view("User.Home.good.gooddetat",['da'=>$da,'com'=>$com,'goods'=>$goods,'jh'=>$jh,'gods'=>$gods,'pag'=>$pag,'gid'=>$gid]);
    }




    //ajax分页
    public function ajaxpag($id)
    {   
        
        $da = DB::table('goods')->where('id',$id)->get();
       $com = DB::table('comment as c')
               ->leftjoin('user as u', 'u.id', '=', 'c.uid')
               ->leftjoin('userinfo as uf', 'uf.uid', '=', 'c.uid')
               ->select('c.*', 'u.username', 'uf.pic')
               ->where('c.gid', $da[0]->id)
               ->paginate(5)->toArray();

        $string = '';
        foreach($com['data'] as $datum){
            $string .='<li class="am-comment"> 
          <!-- 评论容器 --> <a href=""> <img " src="'.$datum->pic.'" /> 
           <!-- 评论者头像 --> </a> 
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <a href="#link-to-user" class="am-comment-author">'.$datum->username.'</a> 
             <!-- 评论者 --> 评论于 
             <time datetime="">'.date('Y-m-d',$datum->addtime).'</time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                '.$datum->content.'
             </div> 
           
            </div> 
           </div> 

          
          </div></li>';
          
        }
      
     echo $string;
    }


    //立即购买
    public function buy(Request $request,$id)
    { 
        

       $uid =session('user')->id;
       $add = $request->input('amount');

      $user = DB::table('shoppingcar')->where('uid',$uid)->where('gid',$id)->first();
       
        // dd($user);
        $data['gid'] = $id;
        $data['amount'] = $add;
        $data['uid'] = $uid;

        if($user){
            $ok['amount'] = $user->amount+$add;
            DB::table('shoppingcar')->where('uid',$uid)->where('gid',$id)->update($ok);

        }else{

           DB::table('shoppingcar')->insert($data);
        }


        return redirect('/onlygoods/'.$id);
    }


    //收藏
    public function coll($id)
    {   

       $uid = session('user')->id;
        

        $da = ['uid'=>$uid,'gid'=>$id];
        
        if(DB::table('collection')->where('uid',$uid)->where('gid',$id)->first())
        {
            echo '<script>alert("已经收藏此商品！");location="/ugoodsinfo/'.$id.'"</script>';
        }else{

            $data = DB::table('collection')->insert($da);
            echo '<script>alert("收藏成功");location="/ugoodsinfo/'.$id.'"</script>';
        }
        



    }





    //添加购物车
    public function shoppingcar(Request $request,$id)
        {
            
       $uid =session('user')->id;
       $add = $request->input('amount');

      $user = DB::table('shoppingcar')->where('uid',$uid)->where('gid',$id)->first();
       
        // dd($user);
        $data['gid'] = $id;
        $data['amount'] = $add;
        $data['uid'] = $uid;

        if($user){
            $ok['amount'] = $user->amount+$add;
            DB::table('shoppingcar')->where('uid',$uid)->where('gid',$id)->update($ok);

        }else{

           DB::table('shoppingcar')->insert($data);
        }

            return redirect('/ushoppingcar/'.$id);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->except('_token');

        // dd($data);
        if(DB::table('apply')->insert($data)){
            echo '<script>alert("添加成功");location="/"</script>';
        }else{
            echo 2;
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
        // $data = DB::table('advert')->where('id',$id)->first();
        echo 'a';
        // dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'aw';
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
        echo 'a';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 'a';
    }
}
