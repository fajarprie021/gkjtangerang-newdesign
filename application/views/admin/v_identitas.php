<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-4xl">

    <div class="flex flex-col justify-between items-start mb-10 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Identitas Website'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2">Kelola informasi dasar, kontak, dan sosial media terkait website.</p>
        </div>
    </div>

    <?php 
        $row_identitas = $identitas->row_array();
        $row_alamat = $alamat->row_array();
        $row_tlp = $tlp->row_array();
        $row_email = $email->row_array();

        $sections = array();

        // 1. Identitas Umum
        $sections[] = array(
            'title' => 'Informasi Umum',
            'icon'  => 'info',
            'hidden' => array(
                'id_identitas' => isset($row_identitas['id_identitas']) ? $row_identitas['id_identitas'] : '1'
            ),
            'fields' => array(
                array(
                    'type' => 'text',
                    'name' => 'nama_identitas',
                    'label' => 'Nama Instansi / Website',
                    'value' => isset($row_identitas['nama_identitas']) ? $row_identitas['nama_identitas'] : '',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'name' => 'website_identitas',
                    'label' => 'Alamat URL Website Utama',
                    'value' => isset($row_identitas['website_identitas']) ? $row_identitas['website_identitas'] : '',
                    'required' => true,
                    'col_span' => 2
                )
            )
        );

        // 2. Kontak
        $sections[] = array(
            'title' => 'Informasi Kontak',
            'icon'  => 'contact_mail',
            'hidden' => array(
                'id_alamat' => isset($row_alamat['id_alamat']) ? $row_alamat['id_alamat'] : '1',
                'id_tlp'    => isset($row_tlp['id_tlp']) ? $row_tlp['id_tlp'] : '1',
                'id_email'  => isset($row_email['id_email']) ? $row_email['id_email'] : '1'
            ),
            'fields' => array(
                array(
                    'type' => 'text',
                    'name' => 'nama_gereja',
                    'label' => 'Nama Tempat / Gereja',
                    'value' => isset($row_alamat['nama_gereja']) ? $row_alamat['nama_gereja'] : '',
                    'required' => true,
                    'col_span' => 2
                ),
                array(
                    'type' => 'textarea',
                    'name' => 'alamat_gereja',
                    'label' => 'Alamat Lengkap',
                    'value' => isset($row_alamat['alamat_gereja']) ? $row_alamat['alamat_gereja'] : '',
                    'required' => true,
                    'col_span' => 2
                ),
                array(
                    'type' => 'text',
                    'name' => 'no_tlp',
                    'label' => 'Nomor Telepon',
                    'value' => isset($row_tlp['no_tlp']) ? $row_tlp['no_tlp'] : '',
                    'required' => true
                ),
                array(
                    'type' => 'email',
                    'name' => 'alamat_email',
                    'label' => 'Alamat Email',
                    'value' => isset($row_email['alamat_email']) ? $row_email['alamat_email'] : '',
                    'required' => true
                )
            )
        );

        // 3. Sosial Media
        $sosmed_fields = array();
        $sosmed_ids = array();
        foreach($sosmed->result_array() as $row_sosmed) {
            $sosmed_ids[] = $row_sosmed['id_sosial_media'];
            $sosmed_fields[] = array(
                'type' => 'text',
                'name' => 'sosial_media_href[]',
                'label' => $row_sosmed['sosial_media_name'],
                'icon'  => $row_sosmed['sosial_media_icon'] . ' mr-1',
                'value' => $row_sosmed['sosial_media_href'],
                'placeholder' => 'URL Profil ' . $row_sosmed['sosial_media_name']
            );
        }

        $sections[] = array(
            'title' => 'Link Sosial Media',
            'icon'  => 'share',
            'hidden' => array(
                'id_sosial_media' => $sosmed_ids // Form Layout supports array!
            ),
            'fields' => $sosmed_fields
        );

        // Render Reusable Layout Component
        $this->load->view('admin/components/form_layout', array(
            'action' => base_url().'admin/identitas/simpan',
            'method' => 'post',
            'submit_text' => 'Simpan Pengaturan',
            'sections' => $sections
        ));
    ?>

  </div>
</section>

<!-- Toast Notifications -->
<?php 
$msg = $this->session->flashdata('msg');
$allowed_msgs = array('success', 'error');
if (in_array($msg, $allowed_msgs, true)): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Tindakan berhasil.";
    if($msg == 'success') {
        $toastText = "Identitas website berhasil disimpan.";
    } elseif($msg == 'error') {
        $toastClass = "bg-red-500";
        $toastIcon = "close_circle";
        $toastText = "Gagal menyimpan identitas.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3">
    <span class="material-symbols-outlined"><?php echo $toastIcon; ?></span>
    <span><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }
    }, 4000);
</script>
<?php endif; ?>
