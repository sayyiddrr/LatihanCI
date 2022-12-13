<table class='table'>
					<thead>
						<th>No</th>
						<th>Nama Sekolah</th>
						<th>Alamat Sekolah</th>
						<th>No Telepon</th>
						<th>Proses</th>
					</thead>
					<tbody>
						<?php 
						$getSekolah = $this->msekolah->loadData();
						if($getSekolah->num_rows() ==0){
							echo"<tr><td colspan=7>Belum ada data</td></tr>";
						}else{
							$k=1;
							foreach($getSekolah->result() as $j){
								$btnProses = '<span class="btn btn-primary btn-icon-split btn-sm procEdit" idSekolah="'.$j->IDSekolah.'">
													<span class="icon text-white-50">
														<i class="fas fa-flag"></i>
													</span>
													<span class="text">Edit</span>
												</span>
												
												<span class="btn btn-danger btn-icon-split btn-sm procDelete" idSekolah="'.$j->IDSekolah.'">
													<span class="icon text-white-50">
														<i class="fas fa-trash"></i>
													</span>
													<span class="text">Delete</span>
												</span>
												';
								echo"<tr>
										<td>$k</td>
										<td>$j->NamaSekolah</td>
										<td>$j->Alamat</td>
										<td>$j->NoTelp</td>
										<td>$btnProses</td>
									</tr>";
								$k++;
							}
						}
						?>
					</tbody>
				</table>