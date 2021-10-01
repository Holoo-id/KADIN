@extends('base')
@section('content')
<div class="row">
	<div class="row col-md-4">
		<div class="col-md-3 position-fixed">
			<div class="card card-profile">
				<div class="card-avatar">
					<a href="javascript:;">
						<img class="img" src="https://sunrift.com/wp-content/uploads/2014/12/Blake-profile-photo-square.jpg">
					</a>
				</div>
				<div class="card-body">
					<h6 class="card-category text-gray">Merek usaha goes here</h6>
					<h4 class="card-title border-bottom pb-4">{{ $member->Nama }}</h4>
					{{-- <p class="card-description">
						Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
					</p>
					<a href="javascript:;" class="btn btn-primary btn-round">Follow</a> --}}
					<ul class="list-group">
						<a onclick="openTabs('personalInfo')" class="list-group-item list-group-item-action" style="cursor: pointer">INFORMASI ANGGOTA</a>
						<a onclick="openTabs('bussInfo')" class="list-group-item list-group-item-action" style="cursor: pointer">INFORMASI USAHA</a>
						<a href="" class="list-group-item list-group-item-action">GALERI</a>
						<a href="" class="list-group-item list-group-item-action">MAPS</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <div class="col-md-8">
      <div class="card d-block" id="personalInfo">
        <div class="card-header card-header-primary">
          <h4 class="card-title">INFORMASI</h4>
          <p class="card-category">Informasi Anggota {{ $member->Nama }}</p>
        </div>
        <div class="card-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td class="text-primary fw-bold">
									ID Anggota
								</td>
								<td>
									{{ $member->id }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									NIK
								</td>
								<td>
									{{ $member->NIK }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Nama
								</td>
								<td>
									{{ $member->Nama }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Usia
								</td>
								<td>
									{{ \Carbon\Carbon::now()->year - \Carbon\Carbon::parse($member->tgl_lahir)->format('Y') }} tahun
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Telepon
								</td>
								<td>
									{{ $member->no_HP }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									WA
								</td>
								<td>
									{{ $member->no_WA }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Alamat
								</td>
								<td>
									{{ $member->alamat }}, 
									<br>{{ $member->kategori->kelurahan_desa }}, 
									<br>{{ $member->kategori->kecamatan }}, 
									<br>{{ $member->kategori->kabupaten_kota }}, 
									<br>{{$member->kategori->provinsi}}
								</td>
							</tr>
						</tbody>
					</table>
        </div>
      </div>
      <div class="card d-none" id="bussInfo">
        <div class="card-header card-header-primary">
          <h4 class="card-title">INFORMASI</h4>
          <p class="card-category">Informasi Usaha {{ $member->Nama }}</p>
        </div>
        <div class="card-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td class="text-primary fw-bold">
									Jenis Usaha
								</td>
								<td>
									{{ $member->jenis_usaha }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Merek Usaha
								</td>
								<td>
									{{ $member->alamat }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Produk Usaha
								</td>
								<td>
									{{ $member->produk }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Karyawan Usaha
								</td>
								<td>
									{{ $member->jumlah_karyawan }} orang
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Omset Usaha
								</td>
								<td>
									Rp{{ $member->alamat }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Alamat Usaha
								</td>
								<td>
									{{ $member->alamat }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Email Usaha
								</td>
								<td>
									{{ $member->alamat }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Telepon
								</td>
								<td>
									{{ $member->no_HP }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									WA
								</td>
								<td>
									{{ $member->no_WA }}
								</td>
							</tr>
							<tr>
								<td class="text-primary fw-bold">
									Sosial Media Lain
								</td>
								<td>
									example@usaha.mail
								</td>
							</tr>
						</tbody>
					</table>
        </div>
      </div>
    </div>
  </div>
  <script>
		function openTabs(tabName) {
			var info = document.getElementById("personalInfo");
			var social = document.getElementById("bussInfo");
			if (tabName === "personalInfo") {
				info.classList.add("d-block");
				info.classList.remove("d-none");
				social.classList.add("d-none");
				social.classList.remove("d-block");
			} else if (tabName === "bussInfo") {
				info.classList.add("d-none");
				info.classList.remove("d-block");
				social.classList.add("d-block");
				social.classList.remove("d-none");
			}
		}
	</script>
@endsection