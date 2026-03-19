<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin · Product & User Control</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background: #f4f6fa;
            color: #1e1e2f;
            padding: 2rem;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* header */
        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .admin-header h1 {
            font-weight: 600;
            font-size: 2rem;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .admin-header h1 i {
            color: #d43f3f;
            background: white;
            padding: 0.6rem;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }
        .badge {
            background: #1e1e2f;
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 40px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* card style */
        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 1.8rem 2rem;
            box-shadow: 0 12px 30px rgba(0,0,0,0.03);
            border: 1px solid #eaedf2;
            margin-bottom: 2.5rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .card-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .card-header i {
            color: #d43f3f;
            background: #fff0f0;
            padding: 0.5rem;
            border-radius: 12px;
        }

        /* form rows */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.2rem;
            margin-bottom: 1.5rem;
        }
        .form-group {
            flex: 1 1 200px;
            min-width: 180px;
        }
        .form-group label {
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            font-weight: 600;
            color: #5b5b6b;
            margin-bottom: 0.3rem;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1.5px solid #e3e8ef;
            border-radius: 16px;
            font-size: 0.95rem;
            background: white;
            transition: 0.15s;
            outline: none;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: #d43f3f;
            box-shadow: 0 0 0 3px rgba(212,63,63,0.1);
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn {
            background: #1e1e2f;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            cursor: pointer;
            transition: 0.2s;
            border: 1.5px solid transparent;
            text-decoration: none;
        }
        .btn-primary {
            background: #d43f3f;
        }
        .btn-primary:hover {
            background: #b52b2b;
        }
        .btn-outline {
            background: transparent;
            color: #1e1e2f;
            border-color: #d0d7e5;
        }
        .btn-outline:hover {
            background: #f1f3f7;
        }
        .btn-sm {
            padding: 0.4rem 1.2rem;
            font-size: 0.8rem;
        }

        /* table */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 20px;
            background: white;
            border: 1px solid #eaedf2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }
        th {
            text-align: left;
            padding: 1.2rem 1rem;
            background: #f9fafc;
            font-weight: 600;
            color: #33334e;
            border-bottom: 2px solid #e6eaf0;
        }
        td {
            padding: 1rem 1rem;
            border-bottom: 1px solid #edeff4;
            vertical-align: middle;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .product-img {
            width: 48px;
            height: 48px;
            background: #f0f2f6;
            border-radius: 12px;
            object-fit: cover;
        }
        .action-icons {
            display: flex;
            gap: 0.8rem;
        }
        .action-icons i, .action-icons button {
            font-size: 1.2rem;
            color: #8f9bb3;
            cursor: pointer;
            transition: 0.1s;
            background: none;
            border: none;
            padding: 0;
        }
        .action-icons i:hover, .action-icons button:hover i {
            color: #1e1e2f;
        }
        .action-icons .fa-pen-to-square:hover {
            color: #2e7d32;
        }
        .action-icons .fa-trash-can:hover {
            color: #d43f3f;
        }

        /* user management mini card */
        .user-list {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }
        .user-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f9fafc;
            padding: 0.8rem 1.2rem;
            border-radius: 40px;
            border: 1px solid #edeff4;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            background: #d43f3f20;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d43f3f;
        }
        .user-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-actions i, .user-actions button {
            color: #5f6b7a;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        .user-actions .fa-trash-can:hover {
            color: #d43f3f;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <!-- admin header -->
    <div class="admin-header">
        <h1>
            <i class="fas fa-cog"></i> 
            Admin control panel
        </h1>
        <div style="display: flex; gap: 1rem; align-items: center;">
            <a href="{{ route('home') }}" class="btn btn-outline btn-sm"><i class="fas fa-home"></i> Switch to Home</a>
            <div class="badge">store manager · products & users</div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert-danger">{{ session('error') }}</div>
    @endif

    <!-- CARD: ADD / UPDATE PRODUCT FORM -->
    <div class="card">
        <div class="card-header">
            <h2 id="formTitle"><i class="fas fa-plus-circle" style="margin-right: 10px;"></i> Add Product</h2>
            <span style="color:#d43f3f; font-weight:500;">* admin only</span>
        </div>
        <form id="productForm" action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div id="methodField"></div>
            
            <div class="form-row">
                <div class="form-group" style="flex:2;">
                    <label>product name</label>
                    <input type="text" name="name" id="prodName" placeholder="e.g. Nike Air Max" required>
                </div>
                <div class="form-group">
                    <label>price ($)</label>
                    <input type="number" name="price" id="prodPrice" step="0.01" required>
                </div>
                <div class="form-group">
                    <label>stock</label>
                    <input type="number" name="stock" id="prodStock" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>category</label>
                    <select name="category" id="prodCategory">
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                        <option value="Kids">Kids</option>
                        <option value="Sports">Sports</option>
                        <option value="Running">Running</option>
                        <option value="Lifestyle">Lifestyle</option>
                    </select>
                </div>
                <div class="form-group" style="flex:2;">
                    <label>image url</label>
                    <input type="text" name="image_url" id="prodImg" placeholder="https://example.com/shoe.jpg">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:3;">
                    <label>description</label>
                    <textarea name="description" id="prodDesc" required></textarea>
                </div>
            </div>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fas fa-save"></i> Save Product</button>
                <button type="button" class="btn btn-outline" onclick="resetForm()"><i class="fas fa-rotate-left"></i> Cancel / Reset</button>
                <span style="margin-left: auto; font-size:0.9rem; color:#a1aaba;" id="formStatus">ready</span>
            </div>
        </form>
    </div>

    <!-- CARD: VIEW ALL PRODUCTS -->
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-boxes"></i> All products · inventory</h2>
            <div style="font-size: 0.9rem; color: #666;"><i class="fas fa-info-circle"></i> click pen to edit, trash to delete</div>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name / Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td style="font-family: monospace;">#{{ $product->id }}</td>
                        <td><img src="{{ $product->image_url ?: 'https://placehold.co/100x100?text=No+Image' }}" class="product-img" alt="prod"></td>
                        <td>
                            <strong>{{ $product->name }}</strong><br>
                            <span style="font-size:0.75rem; color:#666; background:#f0f2f6; padding:1px 6px; border-radius:4px;">{{ $product->category }}</span>
                        </td>
                        <td style="font-weight: 700;">${{ number_format($product->price, 2) }}</td>
                        <td>
                            <span style="color: {{ $product->stock < 10 ? '#d43f3f' : 'inherit' }}; font-weight: {{ $product->stock < 10 ? '700' : '400' }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td>
                            <div class="action-icons">
                                <button type="button" onclick="editProduct({{ json_encode($product) }})" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                                <form action="{{ route('admin.products.delete', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- CARD: USER MANAGEMENT -->
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-users-gear"></i> User accounts</h2>
            <span class="badge" style="background:#d43f3f20; color:#d43f3f; border:1px solid #d43f3f30;">{{ count($users) }} users</span>
        </div>
        <div class="user-list">
            @foreach($users as $user)
            <div class="user-row">
                <div class="user-info">
                    <span class="user-avatar"><i class="fa-regular fa-user"></i></span>
                    <div>
                        <strong>{{ $user->name }}</strong> · {{ $user->email }}
                        <span style="margin-left: 1rem; background: {{ $user->isAdmin ? '#d43f3f10' : '#e8ecf3' }}; color: {{ $user->isAdmin ? '#d43f3f' : '#666' }}; padding:0.2rem 0.7rem; border-radius:40px; font-size:0.7rem; font-weight:700;">
                            {{ $user->isAdmin ? 'ADMIN' : 'CUSTOMER' }}
                        </span>
                    </div>
                </div>
                <div class="user-actions">
                    <form action="{{ route('admin.users.update-role', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="isAdmin" value="{{ $user->isAdmin ? 0 : 1 }}">
                        <button type="submit" title="{{ $user->isAdmin ? 'Demote to Customer' : 'Make Admin' }}">
                            <i class="fa-solid {{ $user->isAdmin ? 'fa-user-minus' : 'fa-user-shield' }}"></i>
                        </button>
                    </form>
                    
                    <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Permanently remove this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Remove User"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <hr>
    <div style="text-align: center; color:#888fa0; padding-bottom: 2rem;">
        <i class="fas fa-shield-alt"></i> Control panel active · {{ date('Y') }}
    </div>
</div>

<script>
    function editProduct(product) {
        document.getElementById('formTitle').innerHTML = '<i class="fas fa-pen-to-square" style="margin-right: 10px;"></i> Edit Product';
        document.getElementById('productForm').action = "/admin/products/" + product.id;
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('prodName').value = product.name;
        document.getElementById('prodPrice').value = product.price;
        document.getElementById('prodStock').value = product.stock;
        document.getElementById('prodCategory').value = product.category;
        document.getElementById('prodImg').value = product.image_url;
        document.getElementById('prodDesc').value = product.description;
        
        document.getElementById('formStatus').innerText = 'editing ID: ' + product.id;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function resetForm() {
        document.getElementById('formTitle').innerHTML = '<i class="fas fa-plus-circle" style="margin-right: 10px;"></i> Add Product';
        document.getElementById('productForm').action = "{{ route('admin.products.store') }}";
        document.getElementById('methodField').innerHTML = '';
        document.getElementById('productForm').reset();
        document.getElementById('formStatus').innerText = 'ready';
    }
</script>
</body>
</html>
