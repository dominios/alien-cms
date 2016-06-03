var myPage = {
    id: "myPageId", // string unique ID
    meta: {
        name: "Home Page",
        url: '#', // string: unique URL
        description: "...",
        tags: [
            "foo", "bar"
        ],
        status: "PUBLISHED", // DRAFT, REVIEW, PUBLISHED, DELETED
        author: "admin@admin.sk",
        dateCreated: "timestamp",
        dateModified: "timetsamp"
    },
    versioning: {
        version: 1, // int: incremental number
        previousVersions: [
            "listOfIds ???" // feature
        ]
    },
    localization: {
        // feature will be added later  
    },
    template: {
        // template to use (for common components)
        // possible to add overrides
        id: "myTemplate"
    },
    body: {
        // components: ID when referenced, otherwise full data models
        title: "Home Page Title",
        heading: {
            // example of 2 components inside 1 placeholder
            0: {

            },
            1: {

            }
        },
        main: {

        }
    }
};