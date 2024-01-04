<?php


namespace SYSOTEL\APP\Common\Enums\IAM;


use SYSOTEL\APP\Common\Enums\BackedEnumHelpers;


enum AdminPermissionSymbol: string

{
    use BackedEnumHelpers;

    case FullAccess = '*';
    case FullReadAccess = 'FullReadAccess';

    /**
     * ------------------------------------------------
     * ------------------ ACCOUNT --------------------
     * ------------------------------------------------
     */

    case ACCOUNT_FullAccess = 'ACCOUNT.*';
    case ACCOUNT_DescribeProfile = 'ACCOUNT:DescribeProfile';
    case ACCOUNT_EditProfile = 'ACCOUNT:EditProfile';
    case ACCOUNT_ChangeProfilePassword = 'ACCOUNT:ChangeProfilePassword';

    /**
     * ------------------------------------------------
     * -------------------- IAM ----------------------
     * ------------------------------------------------
     */
    case IAM_fullAccess = 'IAM.*';


    // ADMIN PERMISSIONS
    case IAM_AdminPermissions_FullAccess = 'IAM:AdminPermissions:*';
    case IAM_AdminPermissions_SortPermissions = 'IAM:AdminPermissions:SortPermissions';
    case IAM_AdminPermissions_ListPermissions = 'IAM:AdminPermissions:ListPermissions';
    case IAM_AdminPermissions_DescribePermission = 'IAM:AdminPermissions:DescribePermission';
    case IAM_AdminPermissions_EditPermissions = 'IAM:AdminPermissions:EditPermissions';
    case IAM_AdminPermissions_ListRoles = 'IAM:AdminPermissions:ListRoles';
    case IAM_AdminPermissions_DescribeRole = 'IAM:AdminPermissions:DescribeRole';
    case IAM_AdminPermissions_CreateRole = 'IAM:AdminPermissions:CreateRole';
    case IAM_AdminPermissions_EditRole = 'IAM:AdminPermissions:EditRole';
    case IAM_AdminPermissions_EditRolePermissions = 'IAM:AdminPermissions:EditRolePermissions';


    // ADMIN MANAGEMENT
    case IAM_AdminManagement_FullAccess = 'IAM:AdminManagement:*';
    case IAM_AdminManagement_ListAdmins = 'IAM:AdminManagement:ListAdmins';
    case IAM_AdminManagement_CreateAdmin = 'IAM:AdminManagement:CreateAdmin';
    case IAM_AdminManagement_DescribeAdmin = 'IAM:AdminManagement:DescribeAdmin';
    case IAM_AdminManagement_EditAdmin = 'IAM:AdminManagement:EditAdmin';
    case IAM_AdminManagement_ActivateAdmin = 'IAM:AdminManagement:ActivateAdmin';
    case IAM_AdminManagement_BlockAdmin = 'IAM:AdminManagement:BlockAdmin';
    case IAM_AdminManagement_AssignRole = 'IAM:AdminManagement:AssignRole';
    case IAM_AdminManagement_RevokeRole = 'IAM:AdminManagement:RevokeRole';
    case IAM_AdminManagement_DescribeRole = 'IAM:AdminManagement:DescribeRole';
    case IAM_AdminManagement_AssignDirectPermission = 'IAM:AdminManagement:AssignDirectPermission';
    case IAM_AdminManagement_RevokeDirectPermission = 'IAM:AdminManagement:RevokeDirectPermission';
    case IAM_AdminManagement_DescribeDirectPermission = 'IAM:AdminManagement:DescribeDirectPermission';
    case IAM_AdminManagement_ListDirectPermission = 'IAM:AdminManagement:ListDirectPermission';
    case IAM_AdminManagement_ChangePassword = 'IAM:AdminManagement:ChangePassword';

    //Property Management
    case IAM_PropertyManagement_FullAccess = 'IAM:PropertyManagement:*';
    case IAM_PropertyManagement_ListModules = 'IAM:PropertyManagement:ListModules';
    case IAM_PropertyManagement_DescribeModule = 'IAM:PropertyManagement:DescribeModule';
    case IAM_PropertyManagement_AssignModule = 'IAM:PropertyManagement:AssignModule';
    case IAM_PropertyManagement_RevokeModule = 'IAM:PropertyManagement:RevokeModule';

    //Extranet User Management
    case IAM_ExtranetUserManagement_FullAccess = 'IAM:ExtranetUserManagement:*';
    case IAM_ExtranetUserManagement_ListUsers = 'IAM:ExtranetUserManagement:ListUsers';
    case IAM_ExtranetUserManagement_CreateUsers = 'IAM:ExtranetUserManagement:CreateUsers';
    case IAM_ExtranetUserManagement_DescribeUser = 'IAM:ExtranetUserManagement:DescribeUser';
    case IAM_ExtranetUserManagement_EditUser = 'IAM:ExtranetUserManagement:EditUser';
    case IAM_ExtranetUserManagement_UpdatePassword = 'IAM:ExtranetUserManagement:UpdatePassword';
    case IAM_ExtranetUserManagement_UpdateBasicInfo = 'IAM:ExtranetUserManagement:UpdateBasicInfo';
    case IAM_ExtranetUserManagement_UpdateEmail = 'IAM:ExtranetUserManagement:UpdateEmail';
    case IAM_ExtranetUserManagement_UpdateContactNumber = 'IAM:ExtranetUserManagement:UpdateContactNumber';
    case IAM_ExtranetUserManagement_ChangeStatus = 'IAM:ExtranetUserManagement:ChangeStatus';
    case IAM_ExtranetUserManagement_AssignProperty = 'IAM:ExtranetUserManagement:AssignProperty';
    case IAM_ExtranetUserManagement_RevokeProperty = 'IAM:ExtranetUserManagement:RevokeProperty';

    //company management
    case IAM_CompanyManagement_FullAccess = 'IAM:CompanyManagement:*';
    case IAM_CompanyManagement_ListCompany = 'IAM:CompanyManagement:ListCompanies';
    case IAM_CompanyManagement_CreateCompany = 'IAM:CompanyManagement:CreateCompany';
    case IAM_CompanyManagement_UpdateCompany = 'IAM:CompanyManagement:UpdateCompany';
    case IAM_CompanyManagement_UpdateCompanyStatus = 'IAM:CompanyManagement:UpdateCompanyStatus';
    case IAM_CompanyManagement_ManageGroupAssignments = 'IAM:CompanyManagement:ManageGroupAssignments';
    case IAM_CompanyManagement_ManagePropertyAssignments = 'IAM:CompanyManagement:ManagePropertyAssignments';


    //group management
    case IAM_GroupManagement_FullAccess = 'IAM:GroupManagement:*';
    case IAM_GroupManagement_ListGroups = 'IAM:GroupManagement:ListGroups';
    case IAM_GroupManagement_CreateGroup = 'IAM:GroupManagement:CreateGroup';
    case IAM_GroupManagement_UpdateGroup = 'IAM:GroupManagement:UpdateGroup';
    case IAM_GroupManagement_UpdateGroupStatus = 'IAM:GroupManagement:UpdateGroupStatus';
    case IAM_GroupManagement_ManageCompanyAssignments = 'IAM:GroupManagement:ManageCompanyAssignments';
    case IAM_GroupManagement_ManagePropertyAssignments = 'IAM:GroupManagement:ManagePropertyAssignments';
    /**
     * ------------------------------------------------
     * -------------------- CMS ----------------------
     * ------------------------------------------------
     */
    case CMS_FullAccess = 'CMS.*';

    case CMS_Reports_FullAccess = 'CMS:Reports:*';
    case CMS_Reports_READ = 'CMS:Reports:Read';
    case CMS_Reports_DOWNLOAD = 'CMS:Reports:Download';

    // CONTENT MANAGEMENT
    case CMS_ContentManagement_FullAccess = 'CMS:ContentManagement:ListLocations:*';
    case CMS_ContentManagement_ListLocations = 'CMS:ContentManagement:ListLocations';
    case CMS_ContentManagement_DescribeLocations = 'CMS:ContentManagement:DescribeLocations';
    case CMS_ContentManagement_AddLocation = 'CMS:ContentManagement:AddLocation';
    case CMS_ContentManagement_EditLocation = 'CMS:ContentManagement:EditLocation';


    // PROPERTY MANAGEMENT
    case CMS_PropertyManagement_FullAccess = 'CMS:PropertyManagement:*';
    case CMS_PropertyManagement_ListProperties = 'CMS:PropertyManagement:ListProperties';
    case CMS_PropertyManagement_DescribeProperty = 'CMS:PropertyManagement:DescribeProperty';
    case CMS_PropertyManagement_CreateProperty = 'CMS:PropertyManagement:CreateProperty';
    case CMS_PropertyManagement_EditPropertyBasicDetails = 'CMS:PropertyManagement:EditPropertyBasicDetails';
    case CMS_PropertyManagement_ActivateProperty = 'CMS:PropertyManagement:ActivateProperty';
    case CMS_PropertyManagement_BlockProperty = 'CMS:PropertyManagement:BlockProperty';
    case CMS_PropertyManagement_AssignExtranetUser = 'CMS:PropertyManagement:AssignExtranetUser';
    case CMS_PropertyManagement_RevokeExtranetUser = 'CMS:PropertyManagement:RevokeExtranetUser';
    case CMS_ApiLogs_FullAccess = 'CMS:ApiLogs:*';
    case CMS_ApiLogs_ListLogs = 'CMS:ApiLogs:ListLogs';
    case CMS_ApiLogs_DescribeLogs = 'CMS:ApiLogs:DescribeLogs';
    case CMS_ApiLogs_DownloadRequestData = 'CMS:ApiLogs:DownloadRequestData';
    case CMS_ApiLogs_DownloadResponseData = 'CMS:ApiLogs_DownloadResponseData';

    case CMS_OpenApiClients_FullAccess = 'CMS:OpenApiClients:*';
    case CMS_OpenApiClients_CreateClient = 'CMS:OpenApiClients:CreateClient';
    case CMS_OpenApiClients_ListClients = 'CMS:OpenApiClients:ListClients';
    case CMS_OpenApiClients_DescribeClient = 'CMS:OpenApiClients:DescribeClient';
    case CMS_OpenApiClients_UpdateClient = 'CMS:OpenApiClients:UpdateClient';

    case CMS_PropertyLocks_FullAccess = 'CMS:PropertyLocks:*';
    case CMS_PropertyLocks_ReadLocks = 'CMS:PropertyLocks:Read';
    case CMS_PropertyLocks_ManageLocks = 'CMS:PropertyLocks:Manage';

    case CMS_Queues_FullAccess = 'CMS:Queues:*';
    case CMS_Queues_ListQueues = 'CMS:Queues:ListQueues';
    case CMS_Queues_DescribeQueue = 'CMS:Queues:DescribeQueue';
    case CMS_Queues_UpdateQueue = 'CMS:Queues:UpdateQueue';


    /**
     * -----------------------------------------------
     * -------------------- IBE ----------------------
     * -----------------------------------------------
     */
    case IBE_FullAccess = 'IBE:*';

    case IBE_PropertyLocks_FullAccess = 'IBE:PropertyLocks:*';
    case IBE_PropertyLocks_ReadLocks = 'IBE:PropertyLocks:Read';
    case IBE_PropertyLocks_ManageLocks = 'IBE:PropertyLocks:Manage';

    case IBE_Reports_FullAccess = 'IBE:Reports:*';
    case IBE_Reports_READ = 'IBE:Reports:Read';
    case IBE_Reports_DOWNLOAD = 'IBE:Reports:Download';

    // BOOKINGS
    case IBE_Bookings_FullAccess = 'IBE:Bookings:*';
    case IBE_Bookings_ListBookings = 'IBE:Bookings:ListBookings';
    case IBE_Bookings_DescribeBooking = 'IBE:Bookings:DescribeBooking';
    case IBE_Bookings_TriggerNotifications = 'IBE:Bookings:TriggerNotifications';
    case IBE_Bookings_ExportReports = 'IBE:Bookings:ExportReports';


    // BOOKING DASHBOARD
    case IBE_BookingDashboard_FullAccess = 'IBE:BookingDashboard:*';
    case IBE_BookingDashboard_ViewCharts = 'IBE:Bookings:ViewCharts';

    //Guest
    case IBE_Guests_FullAccess = 'IBE:Guests:*';
    case IBE_Guests_ListGuests = 'IBE:Guests:ListGuests';
    case IBE_Guests_DescribeGuest = 'IBE:Guests:DescribeGuest';
    case IBE_Guests_ViewContactDetails = 'IBE:Guests:ViewContactDetails';
    case IBE_Guests_UpdateStatus = 'IBE:Guests:UpdateStatus';
    case IBE_Guests_ViewReports = 'IBE:Guests:ViewReports';
    case IBE_Guests_DownloadReports = 'IBE:Guests:DownloadReports';


    // BOOKING ENGINE GROUPS
    case IBE_BeGroups_FullAccess = 'IBE:BeGroups:*';
    case IBE_BeGroups_ListGroups = 'IBE:BeGroups:ListGroups';
    case IBE_BeGroups_DescribeGroup = 'IBE:BeGroups:DescribeGroup';
    case IBE_BeGroups_CreateGroup = 'IBE:BeGroups:CreateGroup';
    case IBE_BeGroups_EditGroup = 'IBE:BeGroups:EditGroup';
    case IBE_BeGroups_AssignProperty = 'IBE:BeGroups:AssignProperty';
    case IBE_BeGroups_RemoveProperty = 'IBE:BeGroups:RemoveProperty';


    // GOOGLE HOTELS
    case IBE_GoogleHotels_FullAccess = 'IBE:GoogleHotels:*';
    case IBE_GoogleHotels_ListProperties = 'IBE:GoogleHotels:ListProperties';
    case IBE_GoogleHotels_DownloadListing = 'IBE:GoogleHotels:DownloadListing';


    // CONNECTIVITY
    case IBE_Connectivity_FullAccess = 'IBE:Connectivity:*';
    case IBE_Connectivity_ListConnectivity = 'IBE:Connectivity:ListConnectivity';
    case IBE_Connectivity_DescribeConnectivity = 'IBE:Connectivity:DescribeConnectivity';
    case IBE_Connectivity_CreateConnectivity = 'IBE:Connectivity:CreateConnectivity';
    case IBE_Connectivity_EditConnectivity = 'IBE:Connectivity:EditConnectivity';
    case IBE_Connectivity_ActivateConnectivity = 'IBE:Connectivity:ActivateConnectivity';
    case IBE_Connectivity_DisableConnectivity = 'IBE:Connectivity:DisableConnectivity';
    case IBE_Connectivity_ViewSecrets = 'IBE:Connectivity:ViewSecrets';
    case IBE_Connectivity_DescribeSecrets = 'IBE:Connectivity:DescribeSecrets';
    case IBE_Connectivity_ViewOnboardingDetails = 'IBE:Connectivity:ViewOnboardingDetails';


    // ARI MONITORING
    case IBE_AriMonitoring_FullAccess = 'IBE:AriMonitoring:*';
    case IBE_AriMonitoring_ViewMonitoring = 'IBE:AriMonitoring:ViewMonitoring';
    case IBE_AriMonitoring_ExportReport = 'IBE:AriMonitoring:ExportReport';


    // CHANNEL LOGS
    case IBE_ChannelLogs_FullAccess = 'IBE:ChannelLogs:*';
    case IBE_ChannelLogs_ListLogs = 'IBE:ChannelLogs:ListLogs';
    case IBE_ChannelLogs_DescribeLog = 'IBE:ChannelLogs:DescribeLog';
    case IBE_ChannelLogs_ReviewLog = 'IBE:ChannelLogs:ReviewLog';


    // API Logs
    case IBE_ApiLogs_FullAccess = 'IBE:ApiLogs:*';
    case IBE_ApiLogs_ListLogs = 'IBE:ApiLogs:ListLogs';
    case IBE_ApiLogs_DescribeLogs = 'IBE:ApiLogs:DescribeLogs';

    case IBE_ApiLogs_DownloadRequestData = 'IBE:ApiLogs:DownloadRequestData';
    case IBE_ApiLogs_DownloadResponseData = 'IBE:ApiLogs_DownloadResponseData';


    // Website Settings
    case IBE_WebsiteSettings_FullAccess = 'IBE:WebsiteSettings:*';
    case IBE_WebsiteSettings_ViewSettings = 'IBE:WebsiteSettings:ViewSettings';
    case IBE_WebsiteSettings_UpdateSettings = 'IBE:WebsiteSettings:UpdateSettings';
    case IBE_PaymentGateways_FullAccess = 'IBE:PaymentGateways:*';
    case IBE_PaymentGateways_ListData = 'IBE:PaymentGateways:ListData';
    case IBE_PaymentGateways_DescribeData = 'IBE:PaymentGateways:DescribeData';
    case IBE_PaymentGateways_UnlockEditing = 'IBE:PaymentGateways:UnlockEditing';
    case IBE_PaymentGateways_UpdateData = 'IBE:PaymentGateways:UpdateData';
    /**
     * -----------------------------------------------
     * -------------------- IYA --- -------------------
     * -----------------------------------------------
     */
    case IYA_FullAccess = 'IYA:*';


    // BOOKING DATA MANAGEMENT
    case IYA_BookingDataManagement_FullAccess = 'IYA:BookingDataManagement:*';


    // BOOKING SETUPS
    case IYA_BookingDataManagement_BookingSetups_FullAccess = 'IYA:BookingDataManagement:BookingSetups:*';

    case IYA_BookingDataManagement_BookingSetups_ListSetups = 'IYA:BookingDataManagement:BookingSetups:ListSetups';
    case IYA_BookingDataManagement_BookingSetups_DescribeSetup = 'IYA:BookingDataManagement:BookingSetups:DescribeSetup';
    case IYA_BookingDataManagement_BookingSetups_CreateSetup = 'IYA:BookingDataManagement:BookingSetups:CreateSetup';
    case IYA_BookingDataManagement_BookingSetups_EditSetup = 'IYA:BookingDataManagement:BookingSetups:EditSetup';
    case IYA_BookingDataManagement_BookingSetups_ActivateSetup = 'IYA:BookingDataManagement:BookingSetups:ActivateSetup';
    case IYA_BookingDataManagement_BookingSetups_RejectSetup = 'IYA:BookingDataManagement:BookingSetups:RejectSetup';
    case IYA_BookingDataManagement_BookingSetups_DisableSetup = 'IYA:BookingDataManagement:BookingSetups:DisableSetup';
    case IYA_BookingDataManagement_BookingSetups_DeleteSetup = 'IYA:BookingDataManagement:BookingSetups:DeleteSetup';


    // BOOKING CONFIGS
    case IYA_BookingDataManagement_BookingConfigs_FullAccess = 'IYA:BookingDataManagement:BookingConfigs:*';
    case IYA_BookingDataManagement_BookingConfigs_ListConfigs = 'IYA:BookingDataManagement:BookingConfigs:ListConfigs';
    case IYA_BookingDataManagement_BookingConfigs_DescribeConfig = 'IYA:BookingDataManagement:BookingConfigs:DescribeConfig';
    case IYA_BookingDataManagement_BookingConfigs_CreateConfig = 'IYA:BookingDataManagement:BookingConfigs:CreateConfig';
    case IYA_BookingDataManagement_BookingConfigs_ActivateConfig = 'IYA:BookingDataManagement:BookingConfigs:ActivateConfig';
    case IYA_BookingDataManagement_BookingConfigs_DisableConfig = 'IYA:BookingDataManagement:BookingConfigs:DisableConfig';
    case IYA_BookingDataManagement_BookingConfigs_RejectConfig = 'IYA:BookingDataManagement:BookingConfigs:RejectConfig';
    case IYA_BookingDataManagement_BookingConfigs_DeleteConfig = 'IYA:BookingDataManagement:BookingConfigs:DeleteConfig';
    case IYA_BookingDataManagement_BookingConfigs_DescribeOnboardingDetails = 'IYA:BookingDataManagement:BookingConfigs:DescribeOnboardingDetails';
    case IYA_BookingDataManagement_BookingConfigs_DescribeSecrets = 'IYA:BookingDataManagement:BookingConfigs:DescribeSecrets';
    case IYA_BookingDataManagement_BookingConfigs_DownloadSecrets = 'IYA:BookingDataManagement:BookingConfigs:DownloadSecrets';


    // BOOKING DATA ACTIVITY
    case IYA_BookingDataManagement_BookingActivity_FullAccess = 'IYA:BookingDataManagement:BookingActivity:*';
    case IYA_BookingDataManagement_BookingActivity_ListActivity = 'IYA:BookingDataManagement:BookingActivity:ListActivity';
    case IYA_BookingDataManagement_BookingActivity_DescribeActivity = 'IYA:BookingDataManagement:BookingActivity:DescribeActivity';


    // BOOKING SUMMARY ACTIVITY
    case IYA_BookingDataManagement_BookingSummaryActivity_FullAccess = 'IYA:BookingDataManagement:BookingSummaryActivity:*';
    case IYA_BookingDataManagement_BookingSummaryActivity_ListActivity = 'IYA:BookingDataManagement:BookingSummaryActivity:ListActivity';
    case IYA_BookingDataManagement_BookingSummaryActivity_DescribeActivity = 'IYA:BookingDataManagement:BookingSummaryActivity:DescribeActivity';


    // BOOKING SUMMARY INSPECTION
    case IYA_BookingDataManagement_BookingSummaryInspection_FullAccess = 'IYA:BookingDataManagement:BookingSummaryInspection:*';
    case IYA_BookingDataManagement_BookingSummaryInspection_ListData = 'IYA:BookingDataManagement:BookingSummaryInspection:ListData';
    case IYA_BookingDataManagement_BookingSummaryInspection_DescribeData = 'IYA:BookingDataManagement:BookingSummaryInspection:DescribeData';


    // BOOKING DATA UPLOAD new
    case IYA_BookingDataManagement_FileUploads_FullAccess = 'IYA:BookingDataManagement:FileUploads:*';
    case IYA_BookingDataManagement_FileUploads_ListUploads = 'IYA:BookingDataManagement:FileUploads::ListUploads';
    case IYA_BookingDataManagement_FileUploads_DescribeUpload = 'IYA:BookingDataManagement:FileUploads::DescribeUpload';
    case IYA_BookingDataManagement_FileUploads_ViewUploadedFile = 'IYA:BookingDataManagement:FileUploads::ViewUploadedFile';
    case IYA_BookingDataManagement_FileUploads_DownloadUploadedFile = 'IYA:BookingDataManagement:FileUploads::DownloadUploadedFile';
    case IYA_BookingDataManagement_FileUploads_UploadFile = 'IYA:BookingDataManagement:FileUploads::UploadFile';

    // BOOKING RAW DATA
    case IYA_BookingDataManagement_RawData_FullAccess = 'IYA:BookingDataManagement:RawData:*';
    case IYA_BookingDataManagement_RawData_ListReviews = 'IYA:BookingDataManagement:RawData:ListBookings';
    case IYA_BookingDataManagement_RawData_DescribeReviews = 'IYA:BookingDataManagement:RawData:DescribeBooking';
    case IYA_BookingDataManagement_RawData_ListReviewInsights = 'IYA:BookingDataManagement:RawData:ListBookingInsights';
    case IYA_BookingDataManagement_RawData_DescribeReviewInsights = 'IYA:BookingDataManagement:RawData:DescribeBookingInsights';

    // RATE SHOPPING DATA MANAGEMENT
    case IYA_RateShoppingManagement_FullAccess = 'IYA:RateShoppingManagement:*';


    // RATE SHOPPER SETUPS
    case IYA_RateShoppingManagement_RateShopperSetups_FullAccess = 'IYA:RateShoppingManagement:RateShopperSetups:*';
    case IYA_RateShoppingManagement_RateShopperSetups_ListSetups = 'IYA:RateShoppingManagement:RateShopperSetups:ListSetups';
    case IYA_RateShoppingManagement_RateShopperSetups_DescribeSetup = 'IYA:RateShoppingManagement:RateShopperSetups:DescribeSetup';
    case IYA_RateShoppingManagement_RateShopperSetups_CreateSetup = 'IYA:RateShoppingManagement:RateShopperSetups:CreateSetup';
    case IYA_RateShoppingManagement_RateShopperSetups_EditSetup = 'IYA:RateShoppingManagement:RateShopperSetups:EditSetup';
    case IYA_RateShoppingManagement_RateShopperSetups_ActivateSetup = 'IYA:RateShoppingManagement:RateShopperSetups:ActivateSetup';
    case IYA_RateShoppingManagement_RateShopperSetups_RejectSetup = 'IYA:RateShoppingManagement:RateShopperSetups:RejectSetup';
    case IYA_RateShoppingManagement_RateShopperSetups_DisableSetup = 'IYA:RateShoppingManagement:RateShopperSetups:DisableSetup';
    case IYA_RateShoppingManagement_RateShopperSetups_DeleteSetup = 'IYA:RateShoppingManagement:RateShopperSetups:DeleteSetup';


    // RATE SHOPPER CONFIGS
    case IYA_RateShoppingManagement_RateShopperConfigs_FullAccess = 'IYA:RateShoppingManagement:RateShopperConfigs:*';
    case IYA_RateShoppingManagement_RateShopperConfigs_ListConfigs = 'IYA:RateShoppingManagement:RateShopperConfigs:ListConfigs';
    case IYA_RateShoppingManagement_RateShopperConfigs_DescribeConfig = 'IYA:RateShoppingManagement:RateShopperConfigs:DescribeConfig';
    case IYA_RateShoppingManagement_RateShopperConfigs_CreateConfig = 'IYA:RateShoppingManagement:RateShopperConfigs:CreateConfig';
    case IYA_RateShoppingManagement_RateShopperConfigs_ActivateConfig = 'IYA:RateShoppingManagement:RateShopperConfigs:ActivateConfig';
    case IYA_RateShoppingManagement_RateShopperConfigs_DisableConfig = 'IYA:RateShoppingManagement:RateShopperConfigs:DisableConfig';
    case IYA_RateShoppingManagement_RateShopperConfigs_RejectConfig = 'IYA:RateShoppingManagement:RateShopperConfigs:RejectConfig';
    case IYA_RateShoppingManagement_RateShopperConfigs_DeleteConfig = 'IYA:RateShoppingManagement:RateShopperConfigs:DeleteConfig';
    case IYA_RateShoppingManagement_RateShopperConfigs_DescribeOnboardingDetails = 'IYA:RateShoppingManagement:RateShopperConfigs:DescribeOnboardingDetails';
    case IYA_RateShoppingManagement_RateShopperConfigs_DescribeSecrets = 'IYA:RateShoppingManagement:RateShopperConfigs:DescribeSecrets';
    case IYA_RateShoppingManagement_RateShopperConfigs_DownloadSecrets = 'IYA:RateShoppingManagement:RateShopperConfigs:DownloadSecrets';

    // REVIEW AUTOMATION
    case IYA_ReviewDataManagement_ReviewAutomation_FullAccess = 'IYA:ReviewDataManagement:ReviewAutomation:*';
    case IYA_ReviewDataManagement_ReviewAutomation_SyncData = 'IYA:ReviewDataManagement:ReviewAutomation:SyncData';
    case IYA_ReviewDataManagement_ReviewAutomation_CreateAutomation = 'IYA:ReviewDataManagement:ReviewAutomation:CreateAutomation';
    case IYA_ReviewDataManagement_ReviewAutomation_ListAutomation = 'IYA:ReviewDataManagement:ReviewAutomation:ListAutomation';
    case IYA_ReviewDataManagement_ReviewAutomation_DescribeAutomation = 'IYA:ReviewDataManagement:ReviewAutomation:DescribeAutomation';

    // RATE SHOPPING ACTIVITY
    case IYA_RateShoppingManagement_RateShoppingActivity_FullAccess = 'IYA:RateShoppingManagement:RateShoppingActivity:*';
    case IYA_RateShoppingManagement_RateShoppingActivity_ListActivity = 'IYA:RateShoppingManagement:RateShoppingActivity:ListActivity';
    case IYA_RateShoppingManagement_RateShoppingActivity_DescribeActivity = 'IYA:RateShoppingManagement:RateShoppingActivity:DescribeActivity';


    // RATE SHOPPING INSPECTION
    case IYA_RateShoppingManagement_RateShoppingInspection_FullAccess = 'IYA:RateShoppingManagement:RateShoppingInspection:*';
    case IYA_RateShoppingManagement_RateShoppingInspection_ListData = 'IYA:RateShoppingManagement:RateShoppingInspection:ListData';
    case IYA_RateShoppingManagement_RateShoppingInspection_DescribeData = 'IYA:RateShoppingManagement:RateShoppingInspection:DescribeData';

    //RATE SHOPPING RAW DATA
    case IYA_RateShoppingManagement_RawData_FullAccess = 'IYA:RateShoppingManagement:RawData:*';
    case IYA_RateShoppingManagement_RawData_ListRateShopping = 'IYA:RateShoppingManagement:RawData:ListRateShopping';
    case IYA_RateShoppingManagement_RawData_DescribeRateShopping = 'IYA:RateShoppingManagement:RawData:DescribeRateShopping';

    // REVIEW SETUPS
    case IYA_ReviewDataManagement_FullAccess = 'IYA:ReviewDataManagement:*';

    case IYA_ReviewDataManagement_ReviewSetups_FullAccess = 'IYA:ReviewDataManagement:ReviewSetups:*';
    case IYA_ReviewDataManagement_ReviewSetups_ListSetups = 'IYA:ReviewDataManagement:ReviewSetups:ListSetups';
    case IYA_ReviewDataManagement_ReviewSetups_DescribeSetup = 'IYA:ReviewDataManagement:ReviewSetups:DescribeSetup';
    case IYA_ReviewDataManagement_ReviewSetups_CreateSetup = 'IYA:ReviewDataManagement:ReviewSetups:CreateSetup';
    case IYA_ReviewDataManagement_ReviewSetups_EditSetup = 'IYA:ReviewDataManagement:ReviewSetups:EditSetup';
    case IYA_ReviewDataManagement_ReviewSetups_ActivateSetup = 'IYA:ReviewDataManagement:ReviewSetups:ActivateSetup';
    case IYA_ReviewDataManagement_ReviewSetups_RejectSetup = 'IYA:ReviewDataManagement:ReviewSetups:RejectSetup';
    case IYA_ReviewDataManagement_ReviewSetups_DisableSetup = 'IYA:ReviewDataManagement:ReviewSetups:DisableSetup';
    case IYA_ReviewDataManagement_ReviewSetups_DeleteSetup = 'IYA:ReviewDataManagement:ReviewSetups:DeleteSetup';


    // REVIEW CONFIGS
    case IYA_ReviewDataManagement_ReviewConfigs_FullAccess = 'IYA:ReviewDataManagement:ReviewConfigs:*';
    case IYA_ReviewDataManagement_ReviewConfigs_ListConfigs = 'IYA:ReviewDataManagement:ReviewConfigs:ListConfigs';
    case IYA_ReviewDataManagement_ReviewConfigs_DescribeConfig = 'IYA:ReviewDataManagement:ReviewConfigs:DescribeConfig';
    case IYA_ReviewDataManagement_ReviewConfigs_CreateConfig = 'IYA:ReviewDataManagement:ReviewConfigs:CreateConfig';
    case IYA_ReviewDataManagement_ReviewConfigs_ActivateConfig = 'IYA:ReviewDataManagement:ReviewConfigs:ActivateConfig';
    case IYA_ReviewDataManagement_ReviewConfigs_DisableConfig = 'IYA:ReviewDataManagement:ReviewConfigs:DisableConfig';
    case IYA_ReviewDataManagement_ReviewConfigs_RejectConfig = 'IYA:ReviewDataManagement:ReviewConfigs:RejectConfig';
    case IYA_ReviewDataManagement_ReviewConfigs_DeleteConfig = 'IYA:ReviewDataManagement:ReviewConfigs:DeleteConfig';
    case IYA_ReviewDataManagement_ReviewConfigs_DescribeOnboardingDetails = 'IYA:ReviewDataManagement:ReviewConfigs:DescribeOnboardingDetails';
    case IYA_ReviewDataManagement_ReviewConfigs_DescribeSecrets = 'IYA:ReviewDataManagement:ReviewConfigs:DescribeSecrets';
    case IYA_ReviewDataManagement_ReviewConfigs_DownloadSecrets = 'IYA:ReviewDataManagement:ReviewConfigs:DownloadSecrets';

    // REVIEW INSIGHTS AUTOMATION
    case IYA_ReviewDataManagement_ReviewInsightsAutomation_FullAccess = 'IYA:ReviewDataManagement:ReviewInsightsAutomation:*';
    case IYA_ReviewDataManagement_ReviewInsightsAutomation_SyncData = 'IYA:ReviewDataManagement:ReviewInsightsAutomation:SyncData';
    case IYA_ReviewDataManagement_ReviewInsightsAutomation_TriggerCalculation = 'IYA:ReviewDataManagement:ReviewInsightsAutomation:TriggerCalculation';
    case IYA_ReviewDataManagement_ReviewInsightsAutomation_CreateAutomation = 'IYA:ReviewDataManagement:ReviewInsightsAutomation:CreateAutomation';
    case IYA_ReviewDataManagement_ReviewInsightsAutomation_ListAutomation = 'IYA:ReviewDataManagement:ReviewInsightsAutomation:ListAutomation';
    case IYA_ReviewDataManagement_ReviewInsightsAutomation_DescribeAutomation = 'IYA:ReviewDataManagement:ReviewInsightsAutomation:DescribeAutomation';

    // REVIEW ACTIVITY
    case IYA_ReviewDataManagement_ReviewActivity_FullAccess = 'IYA:ReviewDataManagement:ReviewActivity:*';
    case IYA_ReviewDataManagement_ReviewActivity_ListActivity = 'IYA:ReviewDataManagement:ReviewActivity:ListActivity';
    case IYA_ReviewDataManagement_ReviewActivity_DescribeActivity = 'IYA:ReviewDataManagement:ReviewActivity:DescribeActivity';


    // REVIEW SUMMARY ACTIVITY
    case IYA_ReviewDataManagement_ReviewSummaryActivity_FullAccess = 'IYA:ReviewDataManagement:ReviewSummaryActivity:*';
    case IYA_ReviewDataManagement_ReviewSummaryActivity_ListActivity = 'IYA:ReviewDataManagement:ReviewSummaryActivity:ListActivity';
    case IYA_ReviewDataManagement_ReviewSummaryActivity_DescribeActivity = 'IYA:ReviewDataManagement:ReviewSummaryActivity:DescribeActivity';

    // REVIEW RAW DATA
    case IYA_ReviewDataManagement_RawData_FullAccess = 'IYA:ReviewDataManagement:RawData:*';
    case IYA_ReviewDataManagement_RawData_ListReviews = 'IYA:ReviewDataManagement:RawData:ListReviews';
    case IYA_ReviewDataManagement_RawData_DescribeReviews = 'IYA:ReviewDataManagement:RawData:DescribeReviews';
    case IYA_ReviewDataManagement_RawData_ListReviewInsights = 'IYA:ReviewDataManagement:RawData:ListReviewInsights';
    case IYA_ReviewDataManagement_RawData_DescribeReviewInsights = 'IYA:ReviewDataManagement:RawData:DescribeReviewInsights';

    // RATE SHOPPING AUTOMATION
    case IYA_RateShoppingManagement_RateShoppingAutomation_FullAccess = 'IYA:RateShoppingManagement:RateShoppingAutomation:*';
    case IYA_RateShoppingManagement_RateShoppingAutomation_ListAutomation = 'IYA:RateShoppingManagement:RateShoppingAutomation:ListAutomation';
    case IYA_RateShoppingManagement_RateShoppingAutomation_DescribeAutomation = 'IYA:RateShoppingManagement:RateShoppingAutomation:DescribeAutomation';
    case IYA_RateShoppingManagement_RateShoppingAutomation_CreateAutomation = 'IYA:RateShoppingManagement:RateShoppingAutomation:CreateAutomation';
    case IYA_RateShoppingManagement_RateShoppingAutomation_OnDemandShopping = 'IYA:RateShoppingManagement:RateShoppingAutomation:OnDemandShopping';
    // BOOKING DATA AUTOMATION
    case IYA_BookingDataManagement_BookingDataAutomation_FullAccess = 'IYA:BookingDataManagement:BookingDataAutomation:*';
    case IYA_BookingDataManagement_BookingDataAutomation_SyncData = 'IYA:BookingDataManagement:BookingDataAutomation:SyncData';
    case IYA_BookingDataManagement_BookingDataAutomation_CreateAutomation = 'IYA:BookingDataManagement:BookingDataAutomation:CreateAutomation';
    case IYA_BookingDataManagement_BookingDataAutomation_ListAutomation = 'IYA:BookingDataManagement:BookingDataAutomation:ListAutomation';
    case IYA_BookingDataManagement_BookingDataAutomation_DescribeAutomation = 'IYA:BookingDataManagement:BookingDataAutomation:DescribeAutomation';

    // BOOKING INSIGHTS AUTOMATION
    case IYA_BookingDataManagement_BookingInsightsAutomation_FullAccess = 'IYA:BookingDataManagement:BookingInsightsAutomation:*';
    case IYA_BookingDataManagement_BookingInsightsAutomation_SyncData = 'IYA:BookingDataManagement:BookingInsightsAutomation:SyncData';
    case IYA_BookingDataManagement_BookingInsightsAutomation_TriggerCalculation = 'IYA:BookingDataManagement:BookingInsightsAutomation:TriggerCalculation';
    case IYA_BookingDataManagement_BookingInsightsAutomation_CreateAutomation = 'IYA:BookingDataManagement:BookingInsightsAutomation:CreateAutomation';
    case IYA_BookingDataManagement_BookingInsightsAutomation_ListAutomation = 'IYA:BookingDataManagement:BookingInsightsAutomation:ListAutomation';
    case IYA_BookingDataManagement_BookingInsightsAutomation_DescribeAutomation = 'IYA:BookingDataManagement:BookingInsightsAutomation:DescribeAutomation';

    // COMPSETS
    case IYA_CompsetManagement_FullAccess = 'IYA:CompsetManagement:*';

    case IYA_CompsetManagement_Compsets_FullAccess = 'IYA:CompsetManagement:Compsets:*';
    case IYA_CompsetManagement_Compsets_ListSetups = 'IYA:CompsetManagement:Compsets:ListSetups';
    case IYA_CompsetManagement_Compsets_DescribeSetup = 'IYA:CompsetManagement:Compsets:DescribeSetup';
    case IYA_CompsetManagement_Compsets_CreateSetup = 'IYA:CompsetManagement:Compsets:CreateSetup';
    case IYA_CompsetManagement_Compsets_EditSetup = 'IYA:CompsetManagement:Compsets:EditSetup';
    case IYA_CompsetManagement_Compsets_ActivateSetup = 'IYA:CompsetManagement:Compsets:ActivateSetup';
    case IYA_CompsetManagement_Compsets_RejectSetup = 'IYA:CompsetManagement:Compsets:RejectSetup';
    case IYA_CompsetManagement_Compsets_DisableSetup = 'IYA:CompsetManagement:Compsets:DisableSetup';
    case IYA_CompsetManagement_Compsets_DeleteSetup = 'IYA:CompsetManagement:Compsets:DeleteSetup';


    // PROPERTY DEMAND SETUP
    case IYA_DemandManagement_FullAccess = 'IYA:DemandManagement:*';

    case IYA_DemandManagement_PropertyDemandSetups_FullAccess = 'IYA:DemandManagement:PropertyDemandSetups:*';
    case IYA_DemandManagement_PropertyDemandSetups_ListSetups = 'IYA:DemandManagement:PropertyDemandSetups:ListSetups';
    case IYA_DemandManagement_PropertyDemandSetups_DescribeSetup = 'IYA:DemandManagement:PropertyDemandSetups:DescribeSetup';
    case IYA_DemandManagement_PropertyDemandSetups_CreateSetup = 'IYA:DemandManagement:PropertyDemandSetups:CreateSetup';
    case IYA_DemandManagement_PropertyDemandSetups_EditSetup = 'IYA:DemandManagement:PropertyDemandSetups:EditSetup';
    case IYA_DemandManagement_PropertyDemandSetups_ActivateSetup = 'IYA:DemandManagement:PropertyDemandSetups:ActivateSetup';
    case IYA_DemandManagement_PropertyDemandSetups_RejectSetup = 'IYA:DemandManagement:PropertyDemandSetups:RejectSetup';
    case IYA_DemandManagement_PropertyDemandSetups_DisableSetup = 'IYA:DemandManagement:PropertyDemandSetups:DisableSetup';
    case IYA_DemandManagement_PropertyDemandSetups_DeleteSetup = 'IYA:DemandManagement:PropertyDemandSetups:DeleteSetup';


    // DEMAND ACTIVITY new
    case IYA_DemandManagement_PropertyDemandActivity_FullAccess = 'IYA:DemandManagement:PropertyDemandActivity:*';
    case IYA_DemandManagement_PropertyDemandActivity_ListActivity = 'IYA:DemandManagement:PropertyDemandActivity:ListActivity';
    case IYA_DemandManagement_PropertyDemandActivity_DescribeActivity = 'IYA:DemandManagement:PropertyDemandActivity:DescribeActivity';


    // PROPERTY DATA UPLOAD new
    case IYA_DemandManagement_FileUploads_FullAccess = 'IYA:DemandManagement:FileUploads:*';
    case IYA_DemandManagement_FileUploads_ListUploads = 'IYA:DemandManagement:FileUploads::ListUploads';
    case IYA_DemandManagement_FileUploads_DescribeUpload = 'IYA:DemandManagement:FileUploads::DescribeUpload';
    case IYA_DemandManagement_FileUploads_ViewUploadedFile = 'IYA:DemandManagement:FileUploads::ViewUploadedFile';
    case IYA_DemandManagement_FileUploads_DownloadUploadedFile = 'IYA:DemandManagement:FileUploads::DownloadUploadedFile';
    case IYA_DemandManagement_FileUploads_UploadFile = 'IYA:DemandManagement:FileUploads::UploadFile';
    // PROPERTY DEMAND RAW DATA
    case IYA_DemandManagement_RawData_FullAccess = 'IYA:DemandManagement:RawData:*';
    case IYA_DemandManagement_RawData_ListPropertyDemand = 'IYA:DemandManagement:RawData:ListPropertyDemand';
    case IYA_DemandManagement_RawData_DescribePropertyDemand = 'IYA:DemandManagement:RawData:DescribePropertyDemand';


    // PROPERTY VARIABLES SETUP
    case IYA_PropertyVariablesSetup_FullAccess = 'IYA:PropertyVariablesSetup:*';
    case IYA_PropertyVariablesSetup_ListSetups = 'IYA:PropertyVariablesSetup:ListSetups';
    case IYA_PropertyVariablesSetup_DescribeSetup = 'IYA:PropertyVariablesSetup:DescribeSetup';
    case IYA_PropertyVariablesSetup_CreateSetup = 'IYA:PropertyVariablesSetup:CreateSetup';
    case IYA_PropertyVariablesSetup_EditSetup = 'IYA:PropertyVariablesSetup:EditSetup';
    case IYA_PropertyVariablesSetup_ActivateSetup = 'IYA:PropertyVariablesSetup:ActivateSetup';
    case IYA_PropertyVariablesSetup_RejectSetup = 'IYA:PropertyVariablesSetup:RejectSetup';
    case IYA_PropertyVariablesSetup_DisableSetup = 'IYA:PropertyVariablesSetup:DisableSetup';
    case IYA_PropertyVariablesSetup_DeleteSetup = 'IYA:PropertyVariablesSetup:DeleteSetup';
    case IYA_EventDataManagement_FullAccess = 'IYA:EventDataManagement:FullAccess';
    case IYA_EventDataManagement_EventSetups_FullAccess = 'IYA:EventDataManagement:EventSetups:FullAccess';
    case IYA_EventDataManagement_EventSetups_ListSetups = 'IYA:EventDataManagement:EventSetups:ListSetups';
    case IYA_EventDataManagement_EventSetups_DescribeSetup = 'IYA:EventDataManagement:EventSetups:DescribeSetup';
    case IYA_EventDataManagement_EventSetups_CreateSetup = 'IYA:EventDataManagement:EventSetups:CreateSetup';
    case IYA_EventDataManagement_EventSetups_EditSetup = 'IYA:EventDataManagement:EventSetups:EditSetup';
    case IYA_EventDataManagement_EventSetups_ActivateSetup = 'IYA:EventDataManagement:EventSetups:ActivateSetup';
    case IYA_EventDataManagement_EventSetups_RejectSetup = 'IYA:EventDataManagement:EventSetups:RejectSetup';
    case IYA_EventDataManagement_EventSetups_DisableSetup = 'IYA:EventDataManagement:EventSetups:DisableSetup';

    case IYA_EventDataManagement_RawData_FullAccess = 'IYA:EventDataManagement:RawData:*';
    case IYA_EventDataManagement_RawData_ListEvents = 'IYA:EventDataManagement:RawData:ListEvents';
    case IYA_EventDataManagement_RawData_DescribeEvent = 'IYA:EventDataManagement:RawData:DescribeEvent';
    case IYA_EventDataManagement_RawData_ListVenues = 'IYA:EventDataManagement:RawData:ListVenues';
    case IYA_EventDataManagement_RawData_DescribeVenue = 'IYA:EventDataManagement:DescribeEvent:DescribeVenue';
    case IYA_EventDataManagement_Reports_FullAccess = 'IYA:EventDataManagement:Reports:*';
    case IYA_EventDataManagement_Reports_ViewReports = 'IYA:EventDataManagement:Reports:ViewReports';
    case IYA_EventDataManagement_Reports_DownloadReports = 'IYA:EventDataManagement:Reports:DownloadReports';
    case IYA_EventDataManagement_EventActivity_FullAccess = 'IYA:EventDataManagement:EventActivity:*';
    case IYA_EventDataManagement_EventActivity_ListActivity = 'IYA:EventDataManagement:EventActivity:ListActivity';
    case IYA_EventDataManagement_EventActivity_DescribeActivity = 'IYA:EventDataManagement:EventActivity:DescribeActivity';
    case IYA_EventDataManagement_VenueActivity_FullAccess = 'IYA:EventDataManagement:VenueActivity:*';
    case IYA_EventDataManagement_VenueActivity_ListActivity = 'IYA:EventDataManagement:VenueActivity:ListActivity';
    case IYA_EventDataManagement_VenueActivity_DescribeActivity = 'IYA:EventDataManagement:VenueActivity:DescribeActivity';
    case IYA_EventDataManagement_Automation_FullAccess = 'IYA:EventDataManagement:Automation:*';
    case IYA_EventDataManagement_Automation_ViewAutomation = 'IYA:EventDataManagement:Automation:ViewAutomation';
    case IYA_EventDataManagement_Automation_CreateAutomation = 'IYA:EventDataManagement:Automation:CreateAutomation';
    case IYA_EventDataManagement_Automation_UpdateAutomation = 'IYA:EventDataManagement:Automation:UpdateAutomation';
    case IYA_EventDataManagement_Automation_RemoveAutomation = 'IYA:EventDataManagement:Automation:RemoveAutomation';

    // PROPERTY DEMAND SETUP
    case IYA_Automation_FullAccess = 'IYA:Automation:*';
    case IYA_Automation_ListRoutines = 'IYA:Automation:ListRoutines';
    case IYA_Automation_DescribeRoutine = 'IYA:Automation:DescribeRoutine';
    case IYA_Automation_ListTasks = 'IYA:Automation:ListTasks';
    case IYA_Automation_DescribeTask = 'IYA:Automation:DescribeTask';
    case IYA_Automation_ListTaskAttempts = 'IYA:Automation:ListTaskAttempts';
    case IYA_Automation_DescribeTaskAttempt = 'IYA:Automation:DescribeTaskAttempt';


    // INTELLIGENCE
    case IYA_Intelligence_FullAccess = 'IYA:Intelligence:*';
    case IYA_Intelligence_ListSetups = 'IYA:Intelligence:ListSetups';
    case IYA_Intelligence_DescribeSetup = 'IYA:Intelligence:DescribeSetup';
    case IYA_Intelligence_CreateSetup = 'IYA:Intelligence:CreateSetup';
    case IYA_Intelligence_EditSetup = 'IYA:Intelligence:EditSetup';
    case IYA_Intelligence_DisableSetup = 'IYA:Intelligence:DisableSetup';
    case IYA_Intelligence_ActivateSetup = 'IYA:Intelligence:ActivateSetup';
    case IYA_Intelligence_RejectSetup = 'IYA:Intelligence:RejectSetup';
    case IYA_Intelligence_DeleteSetup = 'IYA:Intelligence:DeleteSetup';


    // API LOGS
    case IYA_ApiLogs_FullAccess = 'IYA:ApiLogs:*';
    case IYA_ApiLogs_ListLogs = 'IYA:ApiLogs:ListLogs';
    case IYA_ApiLogs_DescribeLog = 'IYA:ApiLogs:DescribeLog';
    case IYA_ApiLogs_DownloadRequestData = 'IYA:ApiLogs:DownloadRequestData';


    // VENDOR
    case IYA_VendorManagement_FullAccess = 'IYA:VendorManagement:*';

    case IYA_VendorManagement_AiRateMetrics_FullAccess = 'IYA:VendorManagement:AiRateMetrics:*';
    case IYA_VendorManagement_AiRateMetrics_ListRateShops = 'IYA:VendorManagement:AiRateMetrics:ListRateShops';
    case IYA_VendorManagement_AiRateMetrics_DescribeRateShop = 'IYA:VendorManagement:AiRateMetrics:DescribeRateShop';
    case IYA_VendorManagement_AiRateMetrics_ListRateQueues = 'IYA:VendorManagement:AiRateMetrics:ListRateQueues';
    case IYA_VendorManagement_AiRateMetrics_DescribeRateSQueue = 'IYA:VendorManagement:AiRateMetrics:DescribeRateSQueue';
    case IYA_VendorManagement_AiRateMetrics_ListRateQueueData = 'IYA:VendorManagement:AiRateMetrics:ListRateQueueData';
    case IYA_VendorManagement_AiRateMetrics_DescribeRatesQueueData = 'IYA:VendorManagement:AiRateMetrics:DescribeRatesQueueData';
    case IYA_VendorManagement_AiRateMetrics_SearchHotel = 'IYA:VendorManagement:AiRateMetrics:SearchHotel';
    case IYA_VendorManagement_AiRateMetrics_ViewAccountCredits = 'IYA:VendorManagement:AiRateMetrics:ViewAccountCredits';
    case IYA_VendorManagement_AiRateMetrics_GetQueueStatus = 'IYA:VendorManagement:AiRateMetrics:GetQueueStatus';
    case IYA_VendorManagement_AiRateMetrics_ViewReferenceContent = 'IYA:VendorManagement:AiRateMetrics:ViewReferenceContent';

    case IYA_VendorManagement_AiReviews_FullAccess = 'IYA:VendorManagement:AiReviews:*';
    case IYA_VendorManagement_AiReviews_SearchHotel = 'IYA:VendorManagement:SearchHotel:SearchHotel';
    case IYA_VendorManagement_AiReviews_RequestHotel = 'IYA:VendorManagement:RequestHotel:RequestHotel';

}
