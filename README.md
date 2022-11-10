## CMS MongoDB connection prerequisites

update Amenity category enum
add target flag in PropertyAmenity document
Amenity and PropertyAmenity document > all fields should be nullable
endpoint /amenities
controller
postman request
// fetch data
// response



```



CODE
$propertyAmenities;
$spaceAmenities;






```


```php

$propertyCategories = AmenityCategory::propertyCategories();
$spaceCategories = AmenityCategory::spaceCategories();

// collection amenities
$propertyAmenitiesData = [
    ["category": "BASIC_FACILITIES", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
    ["category": "BASIC_FACILITIES", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
    ["category": "X", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
    ["category": "X", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
];

// collection amenities
$spaceAmenitiesData = [
    ["category": "BASIC_FACILITIES", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
    ["category": "BASIC_FACILITIES", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
    ["category": "X", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
    ["category": "X", "amenityId": "ELEVATOR LIFT","name": "Elevator","description": ""],
];


// collection propertyAmenities
$propertyAmenitiesDocument = {
    "_id": "asdafafasd",
    "propertyId": 213,
    "amenities": [
        
    ]
};


$responseData = [
    'amenityData' => [
        'categories' => [
        
     ]
    ]   
];




// categories
 
 
// spaces
    // categories

$res = {
    amenityData: {
        propertyAmenities: {
            categories: [
                {
                    categoryId: "BASIC_FACILITIES",
                    categoryName: "Basic Facilities", // constantToReadableString
                    amenities: [
                        {
                            amenityId: "ELEVATOR LIFT",
                            name: "Elevator",
                            description: "",
                            
                            value: {
                                flag: true
                            }
                        }
                    ]
                }            
            ]
        },
        spaceAmenities: [
            {
                spaceId: "",
                spaceDisplayName: "",
                amenitiesData: [
                    categories: [
                    {
                        categoryId: "BASIC_FACILITIES",
                        categoryName: "Basic Facilities", // constantToReadableString
                        amenities: [
                            {
                                amenityId: "ELEVATOR LIFT",
                                name: "Elevator",
                                description: "",
                                
                                value: {
                                    flag: true
                                }
                            }
                        ]
                    }            
                ],
                
                categories: [
                    {
                        categoryId: "BASIC_FACILITIES",
                        categoryName: "Basic Facilities", // constantToReadableString
                        amenities: [
                            {
                                amenityId: "ELEVATOR LIFT",
                                name: "Elevator",
                                description: "",
                                
                                value: {
                                    flag: true
                                }
                            }
                        ]
                    }            
                ]
                ]
            },
            {
                spaceId: "",
                spaceDisplayName: "",
                amenitiesData: [
                    categories: [
                    {
                        categoryId: "BASIC_FACILITIES",
                        categoryName: "Basic Facilities", // constantToReadableString
                        amenities: [
                            {
                                amenityId: "ELEVATOR LIFT",
                                name: "Elevator",
                                description: "",
                                
                                value: {
                                    flag: true
                                }
                            }
                        ]
                    }            
                ],
                
                categories: [
                    {
                        categoryId: "BASIC_FACILITIES",
                        categoryName: "Basic Facilities", // constantToReadableString
                        amenities: [
                            {
                                amenityId: "ELEVATOR LIFT",
                                name: "Elevator",
                                description: "",
                                
                                value: {
                                    flag: true
                                }
                            }
                        ]
                    }            
                ]
                ]
            }
        ]
    }
};



```
