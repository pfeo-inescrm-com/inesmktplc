<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

$pid = $product->get_id();
// get product attributes
$pattrs = $product->get_attributes();

global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );

?>

<div class="sidebar-card card-pricing">
    <!-- <div class="price">
        <p class="h1">
            <?php
            ?>
        </p>
    </div> -->
    <div class="purchase-button">
        <!-- <a href="<?php //echo do_shortcode('[add_to_cart_url id=' . $pid . ']') ?>" class="btn btn--lg btn--round"></a> -->
        <?php if ('' === $product->get_price() || 0 == $product->get_price()) : ?>
            <a href="#" class="btn btn--lg btn--round" data-target="#modalFreeProduct" data-toggle="modal">
                <?php _e('Install', 'inesmktplc'); ?>
            </a>
        <?php else : ?>
            <a href="#" class="btn btn--lg btn--round" data-target="#modalPaidProduct" data-toggle="modal">
                <?php _e('Quotation', 'inesmktplc'); ?>
            </a>
        <?php endif; ?>
    </div>
    <!-- end /.purchase-button -->
</div>
<!-- end /.sidebar--card -->

<div class="sidebar-card card--product-infos">
    <div class="card-title">
        <h4><?php _e('Product Information', 'inesmktplc'); ?></h4>
    </div>

    <ul class="infos">
        <!-- display category -->
        <li>
            <p class="data-label">
            <?php _e('Category', 'inesmktplc'); ?>
            </p>
            <p class="info">
                <?php echo wc_get_product_category_list($pid, ', '); ?>
            </p>
        </li>

        <!-- display rest of the product attributes -->
        <?php

        if (!$pattrs) {
            _e('No attributes', 'inesmktplc');
        }

        // iterate product attributes
        foreach ($pattrs as $attribute) {
            // get attributes given names
            $attribute_label_name = $attribute->get_taxonomy_object()->attribute_label;
            // get array of attributes given values
            $attribute_terms = $attribute->get_terms();
            echo '<li>';
            echo '<p class="data-label">';
            echo $attribute_label_name;
            echo '</p>';
            echo '<p class="info">';
            // iterate values
            foreach ($attribute_terms as $terms) {
                $attribute_value = $terms->name;
                echo $attribute_value;
                echo '<br>';
            }
            echo '</p>';
            echo '</li>';
        }
        ?>

        <!-- <li>
            <p class="data-label">Compatibility</p>
            <p class="info">V3.Extend</p>
        </li>
        <li>
            <p class="data-label">Mobility</p>
            <p class="info">No</p>
        </li>
        <li>
            <p class="data-label">Developer</p>
            <p class="info">INES</p>
        </li>
        <li>
            <p class="data-label">Founnisser?</p>
            <p class="info">Outlook</p>
        </li>
        <li>
            <p class="data-label">Integration type</p>
            <p class="info">Native</p>
        </li>
        <li>
            <p class="data-label">Technical Prerequisites</p>
            <p class="info">1, 2, 3</p>
        </li> -->
    </ul>
</div>


<div class="modals-wrapper">
    <!-- Modal Free Product : start -->
    <div class="modal fade" id="modalFreeProduct" tabindex="-1" role="dialog" aria-labelledby="modalFreeProduct">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h3 class="modal-title">Are you sure to delete this item?</h3> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- end /.modal-header -->
                <div class="modal-body text-center">
                    <p>
                        Pour activer ce plugin rendez-vous votre application INES CRM :
                        <br>
                        Configuration du compte <i class="fa fa-arrow-right"></i> Intégration et compléments
                        <br>
                        Vous n’êtes pas administrateur ? Pas de problèmes !
                        <br>
                        <a href="mailto:?subject=Nouvelle%20intégration%20-%20Marketplace%20INES%20CRM%20&body=Cher(e)%20Administrateur,%0d%0dJ'étais%20en%20train%20de%20consulter%20la%20marketplace%20INES%20CRM%20et%20j'ai%20trouvé%20cette%20application%20qui%20peut%20être%20utile%20à%20notre%20organisation%20:%0d%0d<?php echo $current_url; ?>%0d%0dPourriez-vous%20l'activer%20pour%20moi%20?%0d%0dCordialement,%0d%0d" rel="EMAIL" target="_blank">Partagez cette application</a> à votre administrateur de compte il pourra
                        l’installer pour vous.</p>
                    <p>En cas de problème n’hésitez pas contacter nos équipes au 0 825 157 825 ou par email à <a href="mailto:support@inescrm.com">support@inescrm.com</a></p>
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>
    <!-- Modal Free Product : end -->

    <!-- Modal Paid Product : start -->
    <div class="modal fade" id="modalPaidProduct" tabindex="-1" role="dialog" aria-labelledby="modalPaidProduct">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h3 class="modal-title">Are you sure to delete this item?</h3> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- end /.modal-header -->
                <div class="modal-body">
                    <p class="text-center">Merci de contacter votre responsable de compte ou de renseigner le formulaire
                        suivant, nos
                        équipes vous recontacterons dans les plus brefs délais pour étudier votre demande.</p>
                    <div class="weblead-wrapper">
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                        <script type="text/javascript" src="https://secure.inescrm.com/js/Base64.js"></script>
                        <script type="text/javascript" src="https://secure.inescrm.com/js/AjaxHelper.js"></script>
                        <script type="text/javascript" src="https://secure.inescrm.com/js/form_validation.js">
                        </script>
                        <script type="text/javascript" src="https://secure.inescrm.com/js/md5.js"></script>
                        <script type="text/javascript" src="https://secure.inescrm.com/js/jcap.js"></script>
                        <script type="text/javascript">
                            function checkform() {
                                var str;
                                if (str = validateMandatoryTextField('TextBox_107262',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Société > Société - Nom"',
                                        1)) {
                                    alert(str);
                                    return false;
                                };
                                if (str = validateMandatoryTextField('TextBox_107263',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Contact > Nom du contact"',
                                        1)) {
                                    alert(str);
                                    return false;
                                };
                                if (str = validateMandatoryTextField('TextBox_107264',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Contact > Prénom"', 1
                                    )) {
                                    alert(str);
                                    return false;
                                };
                                if (str = validateMandatoryTextField('TextBox_107265',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Contact > Fonction"',
                                        1)) {
                                    alert(str);
                                    return false;
                                };
                                if (str = validateMandatoryTextField('TextBox_107266',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Contact > Téléphone de Contact"',
                                        1)) {
                                    alert(str);
                                    return false;
                                };
                                if (str = validateEmail('TextBox_107267',
                                        'Format de mail incorrect pour "Contact > Email 1"',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Contact > Email 1"',
                                        1)) {
                                    alert(str);
                                    return false;
                                };
                                if (str = validateMandatoryTextField('TextArea_107268',
                                        'Veuillez saisir une valeur pour le champ obligatoire "Société > Remarque"',
                                        1)) {
                                    alert(str);
                                    return false;
                                };
                                document.getElementById('submit').disabled = true;
                                var capOK = jcap();
                                if (!capOK)
                                    document.getElementById('submit').disabled = false;
                                return capOK
                            }
                        </script>
                        <form id="WebLeadsForm_INES" action="https://secure.inescrm.com/InesWebFormHandler/Main.aspx" method="POST" onsubmit="return checkform()">
                            <input type="hidden" name="controlid" id="controlid" value="1343130459">
                            <input type="hidden" name="oid" id="oid" value="e13f94c9-f977-495a-aaa4-590676109ce0">
                            <input type="hidden" name="formid" id="formid" value="5422">
                            <input type="hidden" name="retURL" id="retURL" value="https://marketplace.inescrm.com/">
                            <input type="hidden" name="data" id="data" value="">
                            <input type="hidden" name="Alias" id="Alias" value="INES">
                            <!-- ---------------------------------------------------------------------- -->
                            <table width="100%" border="0" align="center" class="texte2">
                                <tbody>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_0">Société - Nom *</label>
                                        </td>
                                        <td height="20">
                                            <input id="TextBox_107262" name="TextBox_107262" maxlength="50" size="45" title=" Société - Nom" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_1">Nom du contact *</label>
                                        </td>
                                        <td height="20">
                                            <input id="TextBox_107263" name="TextBox_107263" maxlength="40" size="45" title=" Nom du contact" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_2">Prénom *</label>
                                        </td>
                                        <td height="20">
                                            <input id="TextBox_107264" name="TextBox_107264" maxlength="40" size="45" title=" Prénom" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_3">Fonction *</label>
                                        </td>
                                        <td height="20">
                                            <input id="TextBox_107265" name="TextBox_107265" maxlength="100" size="45" title=" Fonction" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_4">Téléphone de Contact *</label>
                                        </td>
                                        <td height="20">
                                            <input id="TextBox_107266" name="TextBox_107266" maxlength="25" size="45" title=" Téléphone de Contact" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_5">Email 1 *</label>
                                        </td>
                                        <td height="20">
                                            <input id="TextBox_107267" name="TextBox_107267" maxlength="320" size="45" title=" Email 1" type="text" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20">
                                            <label id="Label_6">Remarque *</label>
                                        </td>
                                        <td height="20">
                                            <textarea id="TextArea_107268" name="TextArea_107268" title=" Remarque" rows="3" onkeydown="javascript:checkLen('TextArea_107268',500);" onkeyup="javascript:checkLen('TextArea_107268',500);" spellcheck="false" required></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div>Veuillez recopier le code ci-dessous</div>
                            <div id="captchaDiv"></div>
                            <script type="text/javascript">
                                sjcap('captchaDiv', 'txtCaptcha', null);
                            </script>
                            <!-- <input type="submit" name="submit" id="submit"> -->
                            <div class="text-center">
                                <button type="submit" name="submit" id="submit" class="btn btn-lg btn--round btn--default"><?php _e('Submit', 'inesmktplc'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>
    <!-- Modal Paid Product : end -->
</div>