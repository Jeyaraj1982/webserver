                

                var ErrorCount = 0;
                
                function IsNonEmpty(ElemID,ResultDiv,Message){
                    jQuery('#'+ResultDiv).html("");
                    if (jQuery('#'+ElemID).val()=="" || jQuery('#'+ElemID).val().trim()=="") {
                        ErrorCount++;
                        jQuery('#'+ResultDiv).html(Message);  
                        return false;
                    }
                    return true;
                }

             
                function IsEmail(ElemID,ResultDiv,Message) {
                    if (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/.test(jQuery("#"+ElemID).val())) {
                        return true;       
                    } else {
                        ErrorCount++;
                        jQuery('#'+ResultDiv).html(Message);
                        return false;
                    }
                }
              
     