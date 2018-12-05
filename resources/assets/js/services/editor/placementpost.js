tinymce.PluginManager.add('placementPost', function(editor, url) {

    // Add a button that opens a window
    editor.addButton('placementPost', {
        text: 'Placement Post Form',
        icon: false,
        onclick: function() {
            // Open window
            editor.windowManager.open({
                title: 'Placement Post Form',
                body: [
                    { type: 'textbox', name: 'cname', label: 'Company Name' },
                    { type: 'textbox', name: 'branch', label: 'Branch (i.e. B.Tech(CSE/IT) and MCA)' },
                    { type: 'textbox', name: 'batch', label: 'Batch (i.e. year, Example - 2018)' },
                    { type: 'textbox', name: 'dated', label: 'Date of drive (Example - 20th August 2018 (i.e.Monday))' },
                    { type: 'textbox', name: 'venued', label: 'Venue (T&P Conference Hall)' },
                    { type: 'textbox', name: 'linkd', label: 'Registration Link' },
                    { type: 'textbox', name: 'rdate', label: 'Last Registration Date and Time (Example - 7/10/2018 (i.e. Sunday) 4 PM)' },
                    { type: 'textbox', name: 'jloc', label: 'Job Location' },
                    { type: 'textbox', name: 'jprof', label: 'Job Profile' },
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<p style="text-align: justify;">This is to inform <strong>' + e.data.branch + '(' + e.data.branch + 'passing out batch)</strong> that <strong>' + e.data.cname + '</strong> is going to conduct a <strong>Campus Placement Drive</strong>. The details are as follows:</p> <p style = "text-align: justify;"> <strong> Name of company: </strong>&nbsp;' + e.data.cname + '</p><p style = "text-align: justify;"> <strong> About the company: </strong>Add some text here&nbsp;</p><p style="text-align: justify;"><strong>Date of Drive:</strong>' + e.data.dated + '</p><p style="text-align: justify;"><strong>Reporting Time: </strong>' + e.data.timed + ' (Sharp)</p><p style="text-align: justify;"><strong>Venue:</strong> ' + e.data.venued + '</p><p style="text-align: justify;"><strong>Recruitment Process:</strong></p><ol style="text-align: justify;"><li>Add Here</li><li>Add Here</li></ol><p style="text-align: justify;"><strong>Eligibility Criteria:</strong></p><ul style="text-align: justify;"><li><strong>Qualifications</strong>: Full-time graduates from ' + e.data.branch + '&ndash;' + e.data.branch + ' year of passing.</li><li><strong>Marks Criteria</strong>: <ul><li style="text-align: justify;">60% or above in 10th&nbsp;</li><li style="text-align: justify;">60% or above in 12th (if applicable)</li><li style="text-align: justify;">60% or above in diploma (if applicable)</li><li style="text-align: justify;">60% or above in UG</li><li style="text-align: justify;">60% or above in PG</li></ul><li><strong>Backlog Criteria</strong>: No active backlog allowed at the time of appearing for the test.</li><li><strong>Gap Criteria</strong>: Zero gap year in the academics.</li></ul><p style="text-align: justify;"><strong>Registration Link:&nbsp;<a href=" ' + e.data.linkd + '" target="_blank" rel="noopener">' + e.data.linkd + '</a></strong></p><p style="text-align: justify;"><strong>Designation:</strong>' + e.data.jprof + '</p><p style="text-align: justify;"><strong>Job Location:</strong>' + e.data.jloc + '</p> <p style = "text-align: justify;"> <strong> Cost to Company(CTC): </strong></p><ul style = "text-align: justify;"><li> Stipend Rs.xyz / PM for Six Months </li> <li> Post Confirmation CTC Rs.xyz LPA </li></ul><p style="text-align: justify;"><strong>**IMPORTANT DETAILS:</strong></p><ul><li style="text-align: justify;">Eligible students are required to fill the given form by <strong>' + e.data.rdate + '</strong>:<a href="' + e.data.linkd + '" target="_blank" rel="noopener">Register Here!</a></li></ul><p style = "text-align: justify;"><strong>NOTE</strong>: </p><ul><li style="text-align: justify;">Eligible students are required to fill the given form by <strong>' + e.data.rdate + '</strong>:<a href="' + e.data.linkd + '" target="_blank" rel="noopener">Register Here!</a></li><li style = "text-align: justify;"> Students must carry one hard copy of Mark Sheets, Resume, 3 - 4 Recent Passport size photographs and Photo ID Card(Driving License/Passport/Voter ID/College ID) </li><li style="text-align: justify;">Formal attire is mandatory.</li><li style = "text-align: justify;"> All the students are required to carry all their qualification documents starting from Matriculation. </li></ul> ');
                }
            });
        }
    });

    // Adds a menu item to the tools menu
    editor.addMenuItem('placementPost', {
        text: 'Placement Post Form',
        context: 'tools',
        onclick: function() {
            // Open window with a specific url
            editor.windowManager.open({
                title: 'Placement Post Form',
                body: [
                    { type: 'textbox', name: 'cname', label: 'Company Name' },
                    { type: 'textbox', name: 'branch', label: 'Branch (i.e. B.Tech(CSE/IT) and MCA)' },
                    { type: 'textbox', name: 'batch', label: 'Batch (i.e. year, Example - 2018)' },
                    { type: 'textbox', name: 'dated', label: 'Date of drive (Example - 20th August 2018 (i.e.Monday))' },
                    { type: 'textbox', name: 'venued', label: 'Venue (T&P Conference Hall)' },
                    { type: 'textbox', name: 'linkd', label: 'Registration Link' },
                    { type: 'textbox', name: 'rdate', label: 'Last Registration Date and Time (Example - 7/10/2018 (i.e. Sunday) 4 PM)' },
                    { type: 'textbox', name: 'jloc', label: 'Job Location' },
                    { type: 'textbox', name: 'jprof', label: 'Job Profile' },
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<p style="text-align: justify;">This is to inform <strong>' + e.data.branch + '(' + e.data.branch + 'passing out batch)</strong> that <strong>' + e.data.cname + '</strong> is going to conduct a <strong>Campus Placement Drive</strong>. The details are as follows:</p> <p style = "text-align: justify;"> <strong> Name of company: </strong>&nbsp;' + e.data.cname + '</p><p style = "text-align: justify;"> <strong> About the company: </strong>Add some text here&nbsp;</p><p style="text-align: justify;"><strong>Date of Drive:</strong>' + e.data.dated + '</p><p style="text-align: justify;"><strong>Reporting Time: </strong>' + e.data.timed + ' (Sharp)</p><p style="text-align: justify;"><strong>Venue:</strong> ' + e.data.venued + '</p><p style="text-align: justify;"><strong>Recruitment Process:</strong></p><ol style="text-align: justify;"><li>Add Here</li><li>Add Here</li></ol><p style="text-align: justify;"><strong>Eligibility Criteria:</strong></p><ul style="text-align: justify;"><li><strong>Qualifications</strong>: Full-time graduates from ' + e.data.branch + '&ndash;' + e.data.branch + ' year of passing.</li><li><strong>Marks Criteria</strong>: <ul><li style="text-align: justify;">60% or above in 10th&nbsp;</li><li style="text-align: justify;">60% or above in 12th (if applicable)</li><li style="text-align: justify;">60% or above in diploma (if applicable)</li><li style="text-align: justify;">60% or above in UG</li><li style="text-align: justify;">60% or above in PG</li></ul><li><strong>Backlog Criteria</strong>: No active backlog allowed at the time of appearing for the test.</li><li><strong>Gap Criteria</strong>: Zero gap year in the academics.</li></ul><p style="text-align: justify;"><strong>Registration Link:&nbsp;<a href=" ' + e.data.linkd + '" target="_blank" rel="noopener">' + e.data.linkd + '</a></strong></p><p style="text-align: justify;"><strong>Designation:</strong>' + e.data.jprof + '</p><p style="text-align: justify;"><strong>Job Location:</strong>' + e.data.jloc + '</p> <p style = "text-align: justify;"> <strong> Cost to Company(CTC): </strong></p><ul style = "text-align: justify;"><li> Stipend Rs.xyz / PM for Six Months </li> <li> Post Confirmation CTC Rs.xyz LPA </li></ul><p style="text-align: justify;"><strong>**IMPORTANT DETAILS:</strong></p><ul><li style="text-align: justify;">Eligible students are required to fill the given form by <strong>' + e.data.rdate + '</strong>:<a href="' + e.data.linkd + '" target="_blank" rel="noopener">Register Here!</a></li></ul><p style = "text-align: justify;"><strong>NOTE</strong>: </p><ul><li style="text-align: justify;">Eligible students are required to fill the given form by <strong>' + e.data.rdate + '</strong>:<a href="' + e.data.linkd + '" target="_blank" rel="noopener">Register Here!</a></li><li style = "text-align: justify;"> Students must carry one hard copy of Mark Sheets, Resume, 3 - 4 Recent Passport size photographs and Photo ID Card(Driving License/Passport/Voter ID/College ID) </li><li style="text-align: justify;">Formal attire is mandatory.</li><li style = "text-align: justify;"> All the students are required to carry all their qualification documents starting from Matriculation. </li></ul> ');
                }
            });
        }
    });

    return {
        getMetadata: function() {
            return {
                name: "Placement Post Form",
            };
        }
    };
});