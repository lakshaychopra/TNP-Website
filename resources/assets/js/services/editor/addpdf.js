tinymce.PluginManager.add('addpdf', function(editor, url) {

    // Add a button that opens a window
    editor.addButton('addpdf', {
        text: 'Add PDF',
        icon: false,
        onclick: function() {
            // Open window
            editor.windowManager.open({
                title: 'Add PDF from Google Drive',
                body: [
                    { type: 'textbox', name: 'link', label: 'Link' },
                    { type: 'textbox', name: 'height', label: 'Height (0 - 100) in %' }
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<div class="embed-responsive embed-responsive-16by9" style="padding-bottom: ' + e.data.height + '%; text-align: center;"><iframe class="embed-responsive-item" src=" ' + e.data.link + '"></iframe></div>');
                }
            });
        }
    });

    // Adds a menu item to the tools menu
    editor.addMenuItem('addpdf', {
        text: 'Add PDF',
        context: 'tools',
        onclick: function() {
            // Open window with a specific url
            editor.windowManager.open({
                title: 'Add PDF from Google Drive',
                body: [
                    { type: 'textbox', name: 'link', label: 'Link' },
                    { type: 'textbox', name: 'height', label: 'Height (0 - 100) in %' }
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<div class="embed-responsive embed-responsive-16by9" style="padding-bottom: ' + e.data.height + '%; text-align: center;"><iframe class="embed-responsive-item" src=" ' + e.data.link + '"></iframe></div>');
                }
            });
        }
    });

    return {
        getMetadata: function() {
            return {
                name: "Add PDF",
            };
        }
    };
});