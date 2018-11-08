<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //查看Link列表
    public function index(Request $request)
    {
        // dd($request->all());
        //加载模板
        $data = DB::table('link')->where('name','like','%'.$request->input('keyworks').'%')->orderBy('id','ASC')->paginate(8);
        // dd($data);
        return view('Admin.Link.index',['data'=>$data,'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加链接
    public function create()
    {
        //加载模板
        
        return view('Admin.Link.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //处理添加数据
    public function store(Request $request)
    {
        //接收数据
        // dd($request->all());
        $data['name'] = $request->input('name');
        $data['link'] = $request->input('link');
        $data['display'] = 1;

        //插入数据
        if (DB::table('link')->insertGetId($data)){

            return redirect('/alink')->with('success','添加成功');
        }else{

            return redirect('/alink/create')->with('error','添加失败');
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
    //显示修改模板
    public function edit($id)
    {
        //加载模板 引入默认值
        $data = DB::table('link')->where('id',$id)->first();
        return view('Admin.Link.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //处理修改数据
    public function update(Request $request, $id)
    {
        //接收数据
        // dd($request->all());
        $data = $request->except('_token','_method');

        //修改数据
        if (DB::table('link')->where('id',$id)->update($data)){
            return redirect('/alink')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除数据
    public function destroy($id)
    {
        // echo '<script>alert("确定要删除吗")</script>';exit;
        // dd($id);
        //通过id删除数据
        if (DB::table('link')->where('id',$id)->delete()){
            
            return redirect('/alink')->with('success','删除成功');
        }else{
           return redirect('/alink')->with('error','删除失败'); 
        }
    }

    //显示前台申请的链接
    public function apply(Request $request)
    {
       //加载模板
       $data = DB::table('apply')->where('name','like','%'.$request->input('keyworks').'%')->paginate(1);
       return view('Admin.Link.list',['data'=>$data,'request'=>$request->all()]);

    }

    public function doadd($id)
    {
      // echo $id;
      $res = DB::table('apply')->where('id',$id)->first();
      $data['name'] = $res->name;
      $data['link'] = $res->link;
      $data['display'] = 1;

      //添加到link表
      if (DB::table('link')->insertGetId($data)){

        DB::table('apply')->where('id',$id)->delete();
        return redirect('/aapply')->with('success','审核已通过');
      }else{
        return redirect('/aapply')->with('error','请重新审核');
      }
        
    }

    public function del($id)
    {
      // dd($id);
      // 删除apply表对应的数据
      if (DB::table('apply')->where('id',$id)->delete()){
        return redirect('/aapply')->with('success','已处理不通过的请求');
      }else{
        return redirect('/aapply')->with('error','请重新处理不通过的请求');
      }
        
    }
}
