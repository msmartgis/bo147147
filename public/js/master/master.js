function pushDesktopNotification()
    {        
        Push.create("E.B.O", {
            body: "Vous avez une nouvelle notification!",
            icon: '/images/logo/document_logo.png',
            timeout: 100000000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
    }

    var current_user_role = $('meta[name=user-role]').attr("content");
   
    var el = document.querySelector('.notification');    
    var count = Number($('#notification_count_input_id').val()) ; 
    var count_pusher;
 
                
    var pusher = new Pusher('9656e3b943b191d7be22', {
        cluster: 'eu',
        forceTLS: true
    });

    var channel = pusher.subscribe('courrier-validated-channel');
    var data;
    var icon = '';
    var route = '';
    channel.bind('courrier-validated-event', function(data) {  
        console.log(data) 
        if(current_user_role === data.role_name)
        {
            pushDesktopNotification();
            //Push.create('Hello world');
            count_from_bind = Number($('#notification_count_input_id').val());
            count_from_bind++;
            $('#notification_count_input_id').val(count_from_bind)        
            el.setAttribute('data-count', count_from_bind);

            switch (data.element_type) {
                case 'Courrier Entrant':
                    icon = "/images/svg/arrow-right.svg";
                    //route = "{!! route('courriers-entrants.edit', ['courriers_entrant' => '"+data.element_id+"' ]) !!}";
                    route = route('courriers-entrants.edit', {id: data.element_id});
                  
                    break;

                case 'Courrier Sortant':
                    icon = "/images/svg/arrow-left.svg";
                    route = route('courriers-sortants.edit', {id: data.element_id});
                    break;
            
                default:
                    break;
            }

              $('#notification_list ul').prepend(`
                    <li>
                        <div class="media">
                            <div class="media-left">
                                <div class="media-object">
                                    <img src="`+icon+`" style="width: 50px; height: 50px;">
                                </div>
                            </div>
                            <a href="`+route+`">                                
                                `+data.user+` a `+data.action+` un `+data.element_type+` 
                                <div class="row">
                                    <span style="color: darkgrey;">Il y a une minute</span>  
                                </div>       
                            </a>
                            
                        </div>
                                  
                    </li>
                `);
        }        
    });   


       
    el.setAttribute('data-count', count);
    el.classList.remove('notify');
    el.offsetWidth = el.offsetWidth;
    el.classList.add('notify');
    if(count > 0)
    {
        el.classList.add('show-count');
    } 