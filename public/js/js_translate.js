var full_language = "";
var suivant = "";
var precedent = "";
var enregistrer = "";
var title_validation = "";
var texte_validation = "";
var m_confirmButtonText = "";
var m_cancelButtonText = "";
var m_reussi_title = "";
var m_reussi_subtitle = "";
var m_annul_title = "";
var m_annul_subtitle = "";

var lang = $('meta[name="local"]').attr("content");

if (lang == "ar") {
    full_language = "Arabic";
    suivant = "التالي";
    precedent = "السابق";
    enregistrer = "حفظ";
    title_validation = "متأكد من العملية ؟";
    texte_validation = "تأكيد البريد";
    m_confirmButtonText = "موافق";
    m_cancelButtonText = "الغاء";
    m_reussi_title = "تمت العملية بنجاح";
    m_reussi_subtitle = "";
    m_annul_title = "تم الغاء العملية";
    m_annul_subtitle = "لم تطرأ أي تغييرات";
}

if (lang == "en") {
    full_language = "Frensh";
    suivant = "Suivant";
    precedent = "Précédent";
    enregistrer = "Enregistrer";
    title_validation = "Vous êtes sûr?";
    texte_validation = "Validation des courriers";
    m_confirmButtonText = "Confirmer";
    m_cancelButtonText = "Non";
    m_reussi_title = "Réussi!";
    m_reussi_subtitle = "L\'opération a été effectuée avec succès";
    m_annul_title = "L'operation est annulée";
    m_annul_subtitle = "Aucun changement a été éffectué";
}
