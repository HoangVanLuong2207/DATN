@include('header')
<div class="control">
  <a href="{{ route('product-images.create') }}" class="button green">Thêm ảnh sản phẩm</a>
</div>

<div class="card has-table">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-image"></i></span>
      Ảnh sản phẩm
    </p>
    <a href="{{ route('product-images.index') }}" class="card-header-icon">
      <span class="icon"><i class="mdi mdi-reload"></i></span>
    </a>
  </header>

  <div class="card-content">
    <table>
      <thead>
        <tr>
          <th class="checkbox-cell"><input type="checkbox"></th>
          <th>Sản phẩm</th>
          <th>Ảnh</th>
          <th>Size</th>
          <th>Topping</th>
          <th>Ảnh chính?</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($product_images as $item)
        <tr>
          <td class="checkbox-cell"><input type="checkbox"></td>
          <td>{{ $item->sanpham->name ?? 'Không rõ' }}</td>
          <td><img src="{{ asset('storage/' . $item->image_url) }}" width="100px" alt="Ảnh sản phẩm"></td>
          <td>{{ $item->size->name ?? 'Không có' }}</td>
          <td>{{ $item->topping->name ?? 'Không có' }}</td>
          <td>{{ $item->is_primary ? '✔️' : '' }}</td>
          <td class="actions-cell">
            <a href="#" class="button small blue">
              <span class="icon"><i class="mdi mdi-pencil"></i></span>
            </a>
            <a href="#" onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')" class="button small red">
              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Nếu có phân trang --}}
    <div class="table-pagination">
      {{ $product_images->links() }}
    </div>
  </div>
</div>
@include('footer')
