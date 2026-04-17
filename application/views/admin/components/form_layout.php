<?php
/**
 * REUSABLE ADMIN FORM LAYOUT
 * 
 * Config Variables:
 * $action (str)
 * $method (str) default 'post'
 * $enctype (str) default ''
 * $submit_text (str) default 'Simpan'
 * $sections (array)
 * 
 * Section Structure:
 * array(
 *   'title' => 'Informasi',
 *   'icon'  => 'info', // material symbols 
 *   'hidden' => array('id' => '12'), 
 *   'fields' => array(
 *      array(
 *          'type' => 'text' | 'email' | 'textarea' | 'select' | 'file',
 *          'name' => 'xnama',
 *          'label' => 'Nama',
 *          'value' => '',
 *          'required' => true,
 *          'placeholder' => '',
 *          'options' => array('val' => 'Label') // for select
 *      )
 *   )
 * )
 */

$action = isset($action) ? $action : '';
$method = isset($method) ? $method : 'post';
$enctype = !empty($enctype) ? 'enctype="'.$enctype.'"' : '';
$submit_text = isset($submit_text) ? $submit_text : 'Simpan';
$sections = isset($sections) && is_array($sections) ? $sections : array();
?>

<div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
    <form action="<?php echo $action; ?>" method="<?php echo $method; ?>" <?php echo $enctype; ?> class="divide-y divide-gray-100">
        
        <?php foreach($sections as $section): ?>
        <div class="p-8">
            <?php if(!empty($section['title'])): ?>
            <h4 class="font-headline tracking-widest text-lg text-primary mb-6 flex items-center gap-2">
                <?php if(!empty($section['icon'])): ?>
                    <span class="material-symbols-outlined text-secondary"><?php echo $section['icon']; ?></span> 
                <?php endif; ?>
                <?php echo $section['title']; ?>
            </h4>
            <?php endif; ?>

            <?php 
            // Hidden fields
            if(!empty($section['hidden']) && is_array($section['hidden'])) {
                foreach($section['hidden'] as $hname => $hval) {
                    // Check if it's an array of attributes or simple key-value
                    if (is_array($hval)) { // support for multiple dynamic hidden fields
                        foreach($hval as $single_val) {
                             echo '<input type="hidden" name="'.$hname.'[]" value="'.$single_val.'">';
                        }
                    } else {
                        echo '<input type="hidden" name="'.$hname.'" value="'.$hval.'">';
                    }
                }
            }
            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 font-serif">
                <?php 
                if(!empty($section['fields']) && is_array($section['fields'])): 
                    foreach($section['fields'] as $field): 
                        $type = isset($field['type']) ? $field['type'] : 'text';
                        $name = isset($field['name']) ? $field['name'] : '';
                        $label = isset($field['label']) ? $field['label'] : '';
                        $value = isset($field['value']) ? $field['value'] : '';
                        $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
                        $required = !empty($field['required']) ? 'required' : '';
                        // Layout span: full width or single col
                        $col_span = (isset($field['col_span']) && $field['col_span'] == 2) ? 'md:col-span-2' : '';
                        if($type == 'textarea' || $type == 'file') $col_span = 'md:col-span-2'; // Default textarea/file to full width
                ?>
                
                <div class="<?php echo $col_span; ?>">
                    <?php if(!empty($label)): ?>
                        <label class="block text-primary font-headline text-sm mb-2 capitalize">
                            <?php if(!empty($field['icon'])): ?>
                                <i class="<?php echo $field['icon']; ?>"></i> 
                            <?php endif; ?>
                            <?php echo $label; ?>
                        </label>
                    <?php endif; ?>

                    <?php if($type == 'textarea'): ?>
                        <textarea name="<?php echo $name; ?>" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" placeholder="<?php echo $placeholder; ?>" <?php echo $required; ?>><?php echo $value; ?></textarea>
                    
                    <?php elseif($type == 'select'): ?>
                        <select name="<?php echo $name; ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" <?php echo $required; ?>>
                            <option value="">- Pilih -</option>
                            <?php 
                            if(!empty($field['options']) && is_array($field['options'])) {
                                foreach($field['options'] as $opt_val => $opt_label) {
                                    $selected = ($opt_val == $value) ? 'selected' : '';
                                    echo '<option value="'.$opt_val.'" '.$selected.'>'.$opt_label.'</option>';
                                }
                            }
                            ?>
                        </select>
                    
                    <?php elseif($type == 'file'): ?>
                        <input type="file" name="<?php echo $name; ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" <?php echo $required; ?>>
                        <?php if(!empty($value)): ?>
                            <p class="text-xs text-gray-400 mt-2">File saat ini: <?php echo $value; ?></p>
                        <?php endif; ?>
                    
                    <?php else: // text, email, password, etc ?>
                        <input type="<?php echo $type; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary outline-none transition-all" placeholder="<?php echo $placeholder; ?>" <?php echo $required; ?>>
                    <?php endif; ?>
                </div>

                <?php 
                    endforeach; 
                endif; 
                ?>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if(!empty($sections)): ?>
        <!-- Panel Submit -->
        <div class="bg-gray-50 px-8 py-5 flex justify-end gap-3 shrink-0">
            <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-sm uppercase tracking-wider shadow-sm transition-colors">
                <?php echo $submit_text; ?>
            </button>
        </div>
        <?php endif; ?>
        
    </form>
</div>
