@include('components.header')
@include('components.navbar')
    
<div class="d-flex flex-column align-items-center" style="height: 1000px; background-color: #cee5e653">
    <div class="container-fluid d-flex justify-content-center align-items-center py-5" style="height: 300px">
      <div class="d-flex flex-column justify-content-between bg-warning p-4 border border-warning border-3 border-end-0 rounded-start col-3" style="height: 150px">
        <div>
          <h4>Rp.<span>{{ number_format($totalBalance, 2) }}</span></h4>
        </div>
      </div>

      <div class="col-6 d-flex justify-content-center align-items-center border border border-warning border-3 border-start-0 rounded-end" style="height: 150px">
        <div class="col-4 d-flex justify-content-center">
          <a class="text-center text-black" href="{{ route('investasi') }}">
            <img src="{{asset('images/investasiku.png')}}" width="50px" alt="investasi" />
            <h6>Investasi</h6>
          </a>
        </div>
        <div class="col-4 d-flex justify-content-center">
          <a class="text-center text-black" href="#">
            <img src="{{asset('images/obligasi.png')}}" width="50px" alt="obligasi" />
            <h6>Obligasi</h6>
          </a>
        </div>
      </div>
    </div>

    <!-- bagian table -->
    @if($assets->isEmpty())
      <div class="alert alert-warning" role="alert">
        You have no assets.
      </div>
    @else
    <div class="py-5">
      <table class="table table-bordered table-hover text-center" style="vertical-align: middle; width: 1000px">
        <thead class="table-warning">
          <tr>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Kode saham</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Nama Aset</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Jumlah lembar</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Harga(beli)</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Harga(Live)</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Jual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           @foreach($assets as $asset)
            <tr>
              <td>{{ $asset->InvestmentID }}</td>
              <td>{{ $asset->InvestmentName }}</td>
              <td>{{ $asset->BuyAmount }}</td>
              <td>{{ number_format($asset->BuyPrice, 2) }}</td>
              <td>{{ number_format($asset->LatestPrice, 2) }}</td>
              <td>
            
              <!-- Button trigger modal -->

              <button type="button" class="btn" style="background-color: transparent; border: none" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                <img src="{{asset('images/jual.png')}} " width="30px" alt="" />
              </button>

              <div class="modal fade text-start" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" style="background-color: #cee5e6">
                    <div class="modal-header text-white" style="background-color: #0198a3">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Jual Saham</h1>
                      <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body my-3 mx-5">
                      <form>
                        <!-- form kanan kiri -->
                        <div class="row mb-3">
                          <div class="container">
                            <div class="row">
                              <!-- Kolom Kanan -->
                              <div class="col-6 mb-3">
                                <div class="form-group">
                                  <label for="namaAset">Nama Aset</label>
                                  <input type="text" class="form-control" id="namaAset" required />
                                </div>
                              </div>

                              <!-- Kolom Kiri  -->
                              <div class="col-6 mb-3">
                                <div class="form-group">
                                  <label for="kodeSaham">Kode Saham</label>
                                  <input type="text" class="form-control" id="kodeSaham" placeholder="" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="input-group">
                          <span class="input-group-text">Lembar & Harga(live)</span>
                          <input type="number" aria-label="First name" class="form-control" />
                          <fieldset disabled>
                            <input type="text" aria-label="Last name" class="form-control" />
                          </fieldset>
                        </div>

                        <div class="modal-footer py-4">
                          
                          <!-- tombol submitnya -->
                          <button type="submit" class="btn btn-warning text-black border-2" style="font-weight: 400">Jual</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--end modal  -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
    
  </div>

@include('components.footer')

