TelephonyManager telephonyManager =(TelephonyManager)getApplicationContext().getSystemService(Context.TELEPHONY_SERVICE);
//SIM 1 Number
String mSimPhoneNumber1 = telephonyManager.getLine1Number();
//SIM 2 Number
String mSimPhoneNumber2 = telephonyManager.getLine2Number();