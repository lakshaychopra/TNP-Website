tinymce.PluginManager.add('header', function(editor, url) {

            // Add a button that opens a window
            editor.addButton('header', {
                    text: 'Add Header',
                    icon: false,
                    onclick: function() {
                        // Open window
                        editor.windowManager.open({
                                title: 'Add Header',
                                body: [
                                    { type: 'textbox', name: 'nyear', label: 'Year' },
                                    { type: 'textbox', name: 'ndate', label: 'Date' }
                                ],
                                onsubmit: function(e) {
                                    // Insert content when the window form is submitted
                                    editor.insertContent('<p style="text-align: center; margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: `Liberation Serif`, serif;" align="center"><strong><span style="font-size: 16.0pt; font-family: `Times New Roman`, serif;">Guru Nanak Dev Engineering College, Ludhiana</span></strong></p><p style="text-align: center; margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: `Liberation Serif`, serif;" align="center"><strong><span style="font-size: 14.0pt; font-family: `Times New Roman`, serif;">Training and Placement Cell</span></strong></p><p style="text-align: justify;"><span style="margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &#96;Liberation Serif&#96;, serif; text-align: left;"><span style="font-family: &#96;Times New Roman&#96;, serif;">No.PTP/'+ e.data.nyear +'/Gen/</span><span style="margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &#96;Liberation Serif&#96;, serif; text-align: right;"><span style="font-family: &#96;Times New Roman&#96;, serif;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dated: '+ e.data.ndate +'</span></span></p>');
                                    }
                                });
                        }
                    });

                // Adds a menu item to the tools menu
                editor.addMenuItem('header', {
                        text: 'Add Header',
                        context: 'tools',
                        onclick: function() {
                            // Open window with a specific url
                            editor.windowManager.open({
                                    title: 'Add Header',
                                    body: [
                                        { type: 'textbox', name: 'link', label: 'Link' },
                                        { type: 'textbox', name: 'height', label: 'Height (0 - 100) in %' }
                                    ],
                                    onsubmit: function(e) {
                                        // Insert content when the window form is submitted
                                        editor.insertContent('<p style="text-align: center; margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: `Liberation Serif`, serif;" align="center"><strong><span style="font-size: 16.0pt; font-family: `Times New Roman`, serif;">Guru Nanak Dev Engineering College, Ludhiana</span></strong></p><p style="text-align: center; margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: `Liberation Serif`, serif;" align="center"><strong><span style="font-size: 14.0pt; font-family: `Times New Roman`, serif;">Training and Placement Cell</span></strong></p><p style="text-align: justify;"><span style="margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &#96;Liberation Serif&#96;, serif; text-align: left;"><span style="font-family: &#96;Times New Roman&#96;, serif;">No.PTP/'+ e.data.nyear +'/Gen/</span></span><span style="margin: 0in 0in 0.0001pt; font-size: 12pt; font-family: &#96;Liberation Serif&#96;, serif; text-align: right;"><span style="font-family: &#96;Times New Roman&#96;, serif;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dated: '+ e.data.ndate +'</span></span></p>');
                                        }
                                    });
                            }
                        });

                    return {
                        getMetadata: function() {
                            return {
                                name: "Add Header",
                            };
                        }
                    };
                });