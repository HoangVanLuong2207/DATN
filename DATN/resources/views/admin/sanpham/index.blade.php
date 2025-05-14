@include('header')
  <div class="control">
    <button type="submit" class="button green">
        <a href="{{ route('sanpham.create') }}">Thêm sản phẩm</a>
    </button>
            </di>
  <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Clients
        </p>
        <a href="/admin/danhmuc" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        @if (session('success'))
				<div style="color: green; background-color: #e6ffe6; padding: 10px; margin-bottom: 10px;">
					{{ session('success') }}
				</div>
			@endif
        <table>
          <thead>
          <tr>
            <th class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </th>
            <th class="image-cell"></th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Ảnh sản phẩm</th>
            <th>Mô tả</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>  
          </tr>
          </thead>
          <tbody>
          @foreach ($sanpham as $item)
          <tr>
            <td class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </td>
            <td class="image-cell">
            </td>
            <td data-label="Company">{{ $item['name'] }}</td>
            <td data-label="Company">{{ number_format($item['price']) }} VND</td>
            <td data-label="Company"><img src="{{ url("/storage/uploads/$item->image") }}"  width="100px" alt=""></td>
            <td data-label="Company">{{ $item['mota'] }}</td>
            <td data-label="Company">{{ $item->danhmuc->name ?? 'Không có danh mục' }}</td>
            <td class="actions-cell">
                <a href="{{ route('sanpham.edit', ['id' => $item->id]) }}" class="button small blue">
                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                </a>
               <a href="{{ route('sanpham.delete', ['id' => $item->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="button small red">
                  <span class="icon">
                      <i class="mdi mdi-trash-can"></i>
                  </span>
              </a>
            </td>
            @endforeach
          </tbody>
        </table>
        <div class="table-pagination mt-4">
          {{ $sanpham->links() }}
        </div>
        <!-- <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="buttons">
              <button type="button" class="button active">1</button>
              <button type="button" class="button">2</button>
              <button type="button" class="button">3</button>
            </div>
            <small>Page 1 of 3</small>
          </div>
        </div> -->
      </div>
    </div>
@include('footer')