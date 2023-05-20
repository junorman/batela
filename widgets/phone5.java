<RelativeLayout xmlns:androclass="http://schemas.android.com/apk/res/android"  
    xmlns:tools="http://schemas.android.com/tools"  
    android:layout_width="match_parent"  
    android:layout_height="match_parent"  
    android:paddingBottom="@dimen/activity_vertical_margin"  
    android:paddingLeft="@dimen/activity_horizontal_margin"  
    android:paddingRight="@dimen/activity_horizontal_margin"  
    android:paddingTop="@dimen/activity_vertical_margin"  
    tools:context=".MainActivity" >  
  
    <TextView  
        android:id="@+id/textView1"  
        android:layout_width="wrap_content"  
        android:layout_height="wrap_content"  
        android:layout_alignParentLeft="true"  
        android:layout_alignParentTop="true"  
        android:layout_marginLeft="38dp"  
        android:layout_marginTop="30dp"  
        android:text="Phone Details:" />  
  
</RelativeLayout>


<?xml version="1.0" encoding="utf-8"?>  
<manifest xmlns:androclass="http://schemas.android.com/apk/res/android"  
    package="com.javatpoint.telephonymanager"  
    android:versionCode="1"  
    android:versionName="1.0" >  
  
    <uses-sdk  
        android:minSdkVersion="8"  
        android:targetSdkVersion="17" />  
  
    <uses-permission android:name="android.permission.READ_PHONE_STATE"/>   
      
    <application  
        android:allowBackup="true"  
        android:icon="@drawable/ic_launcher"  
        android:label="@string/app_name"  
        android:theme="@style/AppTheme" >  
        <activity  
            android:name="com.javatpoint.telephonymanager.MainActivity"  
            android:label="@string/app_name" >  
            <intent-filter>  
                <action android:name="android.intent.action.MAIN" />  
  
                <category android:name="android.intent.category.LAUNCHER" />  
            </intent-filter>  
        </activity>  
    </application>  
  
</manifest>  


package com.javatpoint.telephonymanager;  
  
import android.os.Bundle;  
import android.app.Activity;  
import android.content.Context;  
import android.telephony.TelephonyManager;  
import android.view.Menu;  
import android.widget.TextView;  
  
public class MainActivity extends Activity {  
   TextView textView1;  
    @Override  
    protected void onCreate(Bundle savedInstanceState) {  
        super.onCreate(savedInstanceState);  
        setContentView(R.layout.activity_main);  
          
        textView1=(TextView)findViewById(R.id.textView1);  
         
        //Get the instance of TelephonyManager  
        TelephonyManager  tm=(TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);  
         
        //Calling the methods of TelephonyManager the returns the information  
        String IMEINumber=tm.getDeviceId();  
        String subscriberID=tm.getDeviceId();  
        String SIMSerialNumber=tm.getSimSerialNumber();  
        String networkCountryISO=tm.getNetworkCountryIso();  
        String SIMCountryISO=tm.getSimCountryIso();  
        String softwareVersion=tm.getDeviceSoftwareVersion();  
        String voiceMailNumber=tm.getVoiceMailNumber();  
          
        //Get the phone type  
        String strphoneType="";  
          
        int phoneType=tm.getPhoneType();  
  
        switch (phoneType)   
        {  
                case (TelephonyManager.PHONE_TYPE_CDMA):  
                           strphoneType="CDMA";  
                               break;  
                case (TelephonyManager.PHONE_TYPE_GSM):   
                           strphoneType="GSM";                
                               break;  
                case (TelephonyManager.PHONE_TYPE_NONE):  
                            strphoneType="NONE";                
                                break;  
         }  
          
        //getting information if phone is in roaming  
        boolean isRoaming=tm.isNetworkRoaming();  
          
        String info="Phone Details:\n";  
        info+="\n IMEI Number:"+IMEINumber;  
        info+="\n SubscriberID:"+subscriberID;  
        info+="\n Sim Serial Number:"+SIMSerialNumber;  
        info+="\n Network Country ISO:"+networkCountryISO;  
        info+="\n SIM Country ISO:"+SIMCountryISO;  
        info+="\n Software Version:"+softwareVersion;  
        info+="\n Voice Mail Number:"+voiceMailNumber;  
        info+="\n Phone Network Type:"+strphoneType;  
        info+="\n In Roaming? :"+isRoaming;  
          
        textView1.setText(info);//displaying the information in the textView  
    }  
  
     
}  

