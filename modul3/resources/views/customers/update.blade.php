<table id="showtable">

    <form action="{{ route('customers.update',$manager->id) }}" method="post">
        @method('PUT')
        @csrf
        <tr>
            <td>Họ và tên</td>
        <td><input type="text" name="name" value="{{ $manager->name ??''}}" placeholder="Nhập tên"></td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td><input type="text" name="phone" value="{{ $manager->phone ??''}}" placeholder="Nhập sđt"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="{{ $manager->email ??''}}" placeholder="Nhập email"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Sửa">
            </td>
        </tr>


    </form>
</table>
