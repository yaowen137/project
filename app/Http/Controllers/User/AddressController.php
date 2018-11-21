<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Address;
use App\Model\User\Shoppingcar;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
        $address_data = address::where('uid', session('user')->id)->get();
        foreach ($address_data as $value) {
            $value->showphone = substr($value->phone,0,3).'* * * *'.substr($value->phone,-3,3);
        }
        return view('User.person.address', ['shoppingcar' => $shoppingcar, 'address_data' => $address_data]);
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
        $data = $request->only('phone', 'name', 'address');
        $data['uid'] = session('user')->id;
        if (address::insert($data)) {
            echo '<script>alert("添加成功");location="/paddress"</script>';
        } else {
            echo '<script>alert("添加失败");location="/paddress"</script>';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // ajax删除
    public function show($id)
    {
        $uid = session('user')->id;
        if (address::where('id', $id)->where('uid', $uid)->delete()) {
            echo 1;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shoppingcar = count(shoppingcar::where('uid', session('user')->id)->get());
        $address_data = address::where('id', $id)->where('uid', session('user')->id)->first();
        if (!$address_data) {
            echo '<script>alert("存在非法操作，无法修改地址信息");location="/paddress"</script>';exit;
        }
        $address = explode(',', $address_data->address);
        $last = last($address);
        array_pop($address);
        $address = implode(',', $address);
        return view('User.person.editaddress', ['shoppingcar' => $shoppingcar, 'address_data' => $address_data, 'address' => $address, 'last' => $last]);
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
        $data = $request->only('address', 'last', 'name', 'phone');
        $data['address'] .= ','.$data['last'];
        unset($data['last']);
        if (address::where('id', $id)->where('uid', session('user')->id)->update($data)) {
            echo '<script>alert("修改成功");location="/paddress"</script>';
        } else {
            echo '<script>alert("修改失败或存在非法操作！");location="/paddress"</script>';
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
