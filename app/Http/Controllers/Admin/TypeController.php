<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getcates()
    {
        //获取表数据
       $cate=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();

       // dd($cate); 
       foreach ($cate as $key=>$value){
            // echo $value->path;
            // 转变为数组
            $arr = explode(',',$value->path);
            // var_dump($arr);
            
            $num = count($arr)-1;
            //字符中重复函数
            $cate[$key]->name = str_repeat('--|',$num).$value->name;
       }
       return $cate;
    }
    public function index(Request $request)
    {
        // $cate=DB::select("select *,concat(path,',',id) as paths from type order by paths");
        $cate=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$request->input('keyworks').'%')->orderBy('paths')->paginate(5);
        // var_dump($cate);exit;
        //遍历
        foreach ($cate as $key=>$value){
            // echo $value->path."<br>";
            //转换为数组
            $arr=explode(",",$value->path);
            // echo "<pre>";
            // var_dump($arr);
            //获取逗号个数
            $len=count($arr)-1;
            //字符串重复函数
            $cate[$key]->name=str_repeat("--|",$len).$value->name;
        }
        // dd($cate);
        //加载列表模板
        return view('Admin.Type.index',['cate'=>$cate,'request'=>$request->all()]);
    }

    //查看子分类
    public function list(Request $request)
    {
       // var_dump(empty($_GET['pid']));exit;
       // if (empty($_GET['pid'])) {
       //          //没有点击
       //          $pid = 0;
       //      }else{
       //          //查看子分类
       //          $pid = $_GET['pid'];
       //      }
      
       $pid = $_GET['pid'];
       
       $cate = DB::table('type')->where('parentid',$pid)->get();
       // dd($data);
       return view('Admin.Type.list',['cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        $cate = $this->getcates();
        // dd($cate);
        return view('Admin.Type.add',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //处理新添加的分类
        //接收所有数据
        // $data = $request->all();
        $data['name'] = $request->input('name');
        $data['parentid'] = $request->input('pid');
        

        //判断接收到的父类ip是否是顶级
        if($request->input('pid') == 0){
            $data['path'] = 0;
        }else{

            //查询父级，得到path  拼接下一级的path路径
            $res = DB::table('type')->select('path')->where('id',$data['parentid'])->first();
            $data['path'] = $res->path.','.$data['parentid'];

        }
        // dd($data);

        //插入数据
        if(DB::table('type')->insertGetId($data)){
            // echo '成功';
            return redirect('/atype')->with('success','添加成功');
        }else{
            // echo '失败';
            return redirect('/atype/crate')->with('error','添加失败');
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
        //加载模板
        // dd($id);
        $data = DB::table('type')->select()->where('id',$id)->first();
        
        return view('Admin.Type.edit',['data'=>$data]);
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
        // dd($request->all());
        //接收数据
        $name = $request->only('name');
        // dd($name);
        //更新数据库
        if(DB::table('type')->where('id',$id)->update($name)){
            // echo 'ok';
            return redirect('/atype')->with('success','修改成功');
        }else{
            // echo 'false';
            return back()->with('error','修改失败');
        }
    }

    //ajax删除
    public function del(Request $request)
    {
        $id = $request->id;
        // dd(DB::table('type')->where('parentid',15)->get()->toArray());
        // $pid = $request->pid;
        if(DB::table('type')->where('parentid',$id)->get()->toArray()){
            return response()->json(['msg'=>2]); 
        }
        //删除数据
        if (DB::table('type')->where('id',$id)->delete()){

            //删除分类，连带商品表对应的数据一同删除
            DB::table('goods')->where('tid',$id)->delete();
            return response()->json(['msg'=>1]);
          
            
        }else{
            return response()->json(['msg'=>0]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
