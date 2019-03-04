<?php
function session_to_time($sessionNumber) {
    switch ($sessionNumber) {
        case '1':
            return '10:00 am';
            break;
        case '2':
            return '11:00 am';
            break;
        case '3':
            return '1:00 pm';
            break;
        
        default:
            return '';
            break;
    }
}
function full_performance_session($shortName) {
    switch ($shortName) {
        case 'Opening':
            return 'Opening Session';
            break;
        case 'Lunch':
            return 'Lunchtime Entertainment';
            break;
        
        default:
            return '';
            break;
    }
}
?>