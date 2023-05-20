TelephonyManager telemamanger = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
String getSimSerialNumber = telemamanger.getSimSerialNumber();
String getSimNumber = telemamanger.getLine1Number();


TelephonyManager tManager = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
String getSimSerialNumber = tManager.getSimSerialNumber();
String getSimNumber = tManager.getLine1Number();

Log.v(TAG, "getSimSerialNumber : " + getSimSerialNumber +" ,getSimNumber : "+ getSimNumber);

