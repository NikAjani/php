SELECT C.prefix, C.firstName, C.lastName, C.dateOfBirth, C.phoneNo, C.emailId,
CA.address1, CA.address2, CA.company, CA.city, CA.state, CA.country, CA.postalCode,
DS.fieldValue AS describeYourSelf,
E.fieldValue AS experience,
CS.fieldValue AS clientSee,
GT.fieldValue AS getInTouch,
HB.fieldValue AS hobbies,
PP.fieldValue AS profileImage,
CP.fieldValue AS certificateFile 

FROM customers AS C 
LEFT JOIN customer_address AS CA ON C.custId = CA.custId 
LEFT JOIN customer_additional_info DS ON C.custId = DS.custId 
LEFT JOIN customer_additional_info E ON C.custId = E.custId 
LEFT JOIN customer_additional_info CS ON C.custId = CS.custId 
LEFT JOIN customer_additional_info GT ON C.custId = GT.custId 
LEFT JOIN customer_additional_info HB ON C.custId = HB.custId 
LEFT JOIN customer_additional_info PP ON C.custId = PP.custId 
LEFT JOIN customer_additional_info CP ON C.custId = CP.custId 

where DS.fieldKey = 'describeYourSelf' AND E.fieldKey = 'experience' AND CS.fieldKey = 'clientSee' AND GT.fieldKey = 'getInTouch' AND HB.fieldKey = 'hobbies' AND PP.fieldKey = 'profileImagePath' AND CP.fieldKey = 'certificateFile' AND C.custId = 1