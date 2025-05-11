

<form method="GET" action="{{ route('products.group', $group_id) }}">
        <p class="nadpis">Typ</p>
        <div class="categories">
            @foreach($types as $type)
                <div class="container">
                    <label class="filter-item">
                        <input type="checkbox" name="types[]" value="{{ $type->id }}"
                            {{ in_array($type->id, request('types', [])) ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                        <span class="label-text">{{ $type->name }}</span>
                    </label>
                </div>
            @endforeach
        </div>


        <p class="nadpis">Značka</p>
        <div class="categories">
            @foreach($brands as $brand)
                <div class="container">
                    <label class="filter-item">
                        <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                            {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                        <span class="label-text">{{ $brand->name }}</span>
                    </label>
                </div>
            @endforeach
        </div>


        <p class="nadpis">Pohlavie</p>
        <div class="categories">
            @foreach(['muž','žena'] as $g)
                <div class="container">
                    <label class="filter-item flex items-center">
                        <input type="checkbox" name="gender[]" value="{{ $g }}"
                            {{ in_array($g, request('gender', [])) ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                        <span class="label-text">{{ ucfirst($g) }}</span>
                    </label>
                </div>
            @endforeach
        </div>


        <p class="nadpis">Cena</p>
        <div class="categories">
            <div>
                <span>Cena od:</span>
                <input type="number" name="price_min" step="0.01"
                       value="{{ request('price_min','') }}"
                       class="input_price w-full mt-1">
            </div>
            <div>
                <span>Cena do:</span>
                <input type="number" name="price_max" step="0.01"
                       value="{{ request('price_max','') }}"
                       class="input_price w-full mt-1">
            </div>
        </div>


        <p class="nadpis">Zoradiť</p>
        <select name="sortSelect" class="sortSelect">
            <option value="none"       {{ $sortSelect==='none'       ? 'selected' : '' }}>Vyber...</option>
            <option value="price_asc"  {{ $sortSelect==='price_asc'  ? 'selected' : '' }}>Cena od najnižšej</option>
            <option value="price_desc" {{ $sortSelect==='price_desc' ? 'selected' : '' }}>Cena od najvyššej</option>
        </select>


        <div class="flex space-x-2 pt-4">
            <button type="submit" class="filter_button">Filtrovať</button>
        </div>
</form>
