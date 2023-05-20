 <LinearLayout
      xmlns:android="http://schemas.android.com/apk/res/android"
      android:layout_width="match_parent"
      android:layout_height="match_parent">

    <EditText
        android:id="@+id/phone"
        android:layout_height="wrap_content"
        android:layout_width="match_parent"
        android:hint="Entrer le numéro de téléphone"
        android:padding="12dp"
        android:maxLength="10"
        android:inputType="phone"
        android:background="@android:drawable/editbox_background" />


    <Button
     android:id="@+id/idBtnStart"
     android:layout_height="wrap_content"
     android:layout_width="wrap_content"
     android:layout_marginTop="32dp"
     android:text="Enregistrer" />

 </LinearLayout>

Libertis  066 24 24 24 062 24 24 24
String test = "StackOverflow"; 
char first = test.charAt(0);
 Button btnStart;
 TextView varText;
 String info;
 String strPhoneType = "";
 static final int PERMISSION_READ_STATE = 123;


 public void Start(View view){
    int permissionCheck = ContextCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE);

    if (permissionCheck == PackageManager.PERMISSION_GRANTED) {
        MyTelephoneManager();
    }else{
        ActivityCompat.requestPermissions(this,
            new String[] {Manifest.permission.READ_PHONE_STATE},
            PERMISSION_READ_STATE);
    }
 }

 public void onRequestPermissionsResult(int requestCode, @NonNull String permissions[], @NonNull int[] grantResults) {
      super.onRequestPermissionsResult(requestCode, permissions, grantResults);
      switch (requestCode) {
         case PERMISSION_READ_STATE:
            {
                if (grantResults.length >= 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                  MyTelephoneManager();
                }else{
                    Toast.makeText(this, "You dont't have required permission to make the Action",
                        Toast.LENGTH_SHORT).show();
                }
            }
           
      }
   }

   private void MyTelephoneManager(){
        TelephonyManager manager = (TelephonyManager)  this.getSystemService(Context.TELEPHONY_SERVICE);
        int phoneType = manager.getPhoneType();
        switch (phoneType){
            case (TelephonyManager.PHONE_TYPE_CDMA):
                strPhoneType = "CDMA";
                break;

            case (TelephonyManager.PHONE_TYPE_GSM):
                strPhoneType = "GSM";
                break;

            case (TelephonyManager.PHONE_TYPE_NONE):
                strPhoneType = "NONE";
                break;
        }
        boolean isRoaming = manager.isNetworkRoaming();

        String PhoneType = strPhoneType;
        String IMEINumber = manager.getDeviceId();
        String subscriberID = manager.getDeviceId();
        String SIMSerialNumber = manager.getSimSerialNumber();
        String networkCountryISO = manager.getNetworkCountryIso();
        String SIMCountryISO = manager.getSimCountryIso();
        String softwareVersion = manager.getDeviceSoftwareVersion();
        String voiceMailNumber = manager.getVoiceMailNumber();

        info = "Phone Détails: \n";
        info += "\n Phone Network Type: "+PhoneType;
        info += "\n IMEI Number: "+IMEINumber;
        info += "\n subscriberID: "+subscriberID;
        info += "\n SIM Serial Number: "+SIMSerialNumber;
        info += "\n network Country ISO: "+networkCountryISO;
        info += "\n SIM Country ISO: "+SIMCountryISO;
        info += "\n software Version: "+softwareVersion;
        info += "\n voice Mail Number: "+voiceMailNumber;
        info += "\n In Roaming: "+isRoaming;
        
        btnStart = (Button) findViewById(R.id.idBtnStart);
        varText = (TextView) findViewById(R.id.idTxtView);
        varText.setText(info);
        
   }    


   <service android:name=".MyService"
        android:enabled="true"
        android:exported="true"/>


