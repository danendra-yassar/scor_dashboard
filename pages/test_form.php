                              <div class="form-group">
                                <label for="email_user">Role User</label>
                                  <select name="id_role" id="id_role">
                                    <option>---</option>
                                    <?php
                                      include "koneksi.php";
                                      $query = mysqli_query($koneksi, "SELECT * FROM tb_role_user") or die (mysqli_connect_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_role]> $data[role_user]</option>";
                                      }
                                    ?>                                                         
                                  </select>                                
                              </div>                   