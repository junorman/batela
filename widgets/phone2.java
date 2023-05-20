<?xml version = "1.0" encoding = "utf-8"?>
<LinearLayout xmlns:android = "http://schemas.android.com/apk/res/android"
   xmlns:app = "http://schemas.android.com/apk/res-auto"
   xmlns:tools = "http://schemas.android.com/tools"
   android:layout_width = "match_parent"
   android:gravity = "center"
   android:layout_height = "match_parent"
   tools:context = ".MainActivity">
   <TextView
      android:id = "@+id/text"
      android:textSize = "30sp"
      android:layout_width = "match_parent"
      android:layout_height = "match_parent" />
</LinearLayout>

package com.example.myapplication;
import android.Manifest;
import android.app.ProgressDialog;
import android.content.pm.PackageManager;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.RequiresApi;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.webkit.CookieManager;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.EditText;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity {
   TextView textView;
   @RequiresApi(api = Build.VERSION_CODES.P)
   @Override
   protected void onCreate(Bundle savedInstanceState) {
      super.onCreate(savedInstanceState);
      setContentView(R.layout.activity_main);
      textView = findViewById(R.id.text);
      if (ActivityCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE) != PackageManager.PERMISSION_GRANTED) {
         ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_PHONE_STATE}, 101);
      }
   }
   @RequiresApi(api = Build.VERSION_CODES.O)
   @Override
   public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults)   {
      switch (requestCode) {
         case 101:
         if (grantResults[0] = = PackageManager.PERMISSION_GRANTED) {
            if (ActivityCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE) !=        PackageManager.PERMISSION_GRANTED) {
               return;
            }
            textView.setText(Build.DEVICE);
         } else {
            //not granted
         }
         break;
         default:
         super.onRequestPermissionsResult(requestCode, permissions, grantResults);
      }
   }
   @RequiresApi(api = Build.VERSION_CODES.O)
   @Override
   protected void onResume() {
      super.onResume();
      if (ActivityCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE) !=   PackageManager.PERMISSION_GRANTED) {
         return;
      }
      textView.setText(Build.DEVICE);
   }
}


<?xml version = "1.0" encoding = "utf-8"?>
<manifest xmlns:android = "http://schemas.android.com/apk/res/android"
   package = "com.example.myapplication">
   <uses-permission android:name = "android.permission.INTERNET"/>
   <uses-permission android:name = "android.permission.READ_PHONE_STATE" />
   <application
      android:allowBackup = "true"
      android:icon = "@mipmap/ic_launcher"
      android:label = "@string/app_name"
      android:roundIcon = "@mipmap/ic_launcher_round"
      android:supportsRtl = "true"
      android:theme = "@style/AppTheme">
      <activity android:name = ".MainActivity">
         <intent-filter>
            <action android:name = "android.intent.action.MAIN" />
            <category android:name = "android.intent.category.LAUNCHER" />
         </intent-filter>
      </activity>
   </application>
</manifest>

=============================================================
String name = Build.MANUFACTURER + " - " + Build.MODEL

=====================================================
Settings.Global.getString(getContentResolver(), Settings.Global.DEVICE_NAME)