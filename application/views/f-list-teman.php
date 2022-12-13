<table class='table'>
					<thead>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Agama</th>
						<th>No HP</th>
						<th>Tgl Lahir</th>
						<th>Proses</th>
					</thead>
					<tbody>
						<?php 
						$getTeman = $this->mteman->loadData();
						if($getTeman->num_rows() ==0){
							echo"<tr><td colspan=7>Belum ada data</td></tr>";
						}else{
							$i=1;
							foreach($getTeman->result() as $r){
								$btnProses = '<span class="btn btn-primary btn-icon-split btn-sm procEdit" idTeman="'.$r->IDTeman.'">
													<span class="icon text-white-50">
														<i class="fas fa-flag"></i>
													</span>
													<span class="text">Edit</span>
												</span>
												
												<span class="btn btn-danger btn-icon-split btn-sm procDelete" idTeman="'.$r->IDTeman.'">
													<span class="icon text-white-50">
														<i class="fas fa-trash"></i>
													</span>
													<span class="text">Delete</span>
												</span>
												';
								echo"<tr>
										<td>$i</td>
										<td>$r->Nama</td>
										<td>$r->Alamat</td>
										<td>$r->Agama</td>
										<td>$r->HP</td>
										<td>$r->TglLahir</td>
										<td>$btnProses</td>
									</tr>";
								$i++;
							}
						}
						?>
					</tbody>
				</table>