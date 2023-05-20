<?xml version="1.0" encoding="utf-8"?>
<manifest xmlns:android="http://schemas.android.com/apk/res/android"
    package="org.o7planning.getphonenumberexample">

    <uses-permission android:name="android.permission.READ_PHONE_STATE"/>

    <application
        android:allowBackup="true"
        android:icon="@mipmap/ic_launcher"
        android:label="@string/app_name"
        android:roundIcon="@mipmap/ic_launcher_round"
        android:supportsRtl="true"
        android:theme="@style/AppTheme">
        <activity android:name=".MainActivity">
            <intent-filter>
                <action android:name="android.intent.action.MAIN" />

                <category android:name="android.intent.category.LAUNCHER" />
            </intent-filter>
        </activity>
    </application>

</manifest>


<?xml version="1.0" encoding="utf-8"?>
<androidx.constraintlayout.widget.ConstraintLayout
    xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:app="http://schemas.android.com/apk/res-auto"
    xmlns:tools="http://schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context=".MainActivity">

    <Button
        android:id="@+id/button_getInfo"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:layout_marginTop="16dp"
        android:text="Get Phone Infos"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toBottomOf="@+id/editText_infos" />

    <EditText
        android:id="@+id/editText_infos"
        android:layout_width="0dp"
        android:layout_height="150dp"
        android:layout_marginStart="16dp"
        android:layout_marginLeft="16dp"
        android:layout_marginTop="32dp"
        android:layout_marginEnd="16dp"
        android:layout_marginRight="16dp"
        android:ems="10"
        android:gravity="top|left"
        android:hint="Phone Number"
        android:inputType="textMultiLine"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toTopOf="parent" />

</androidx.constraintlayout.widget.ConstraintLayout>


package org.o7planning.getphonenumberexample;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.telephony.SignalStrength;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    private static final int MY_PERMISSION_REQUEST_CODE_PHONE_STATE = 1;

    private static final String LOG_TAG = "AndroidExample";

    private EditText editTextPhoneNumbers;

    private Button buttonGetPhones;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        this.editTextPhoneNumbers = (EditText) this.findViewById(R.id.editText_infos);

        this.buttonGetPhones = (Button) this.findViewById(R.id.button_getInfo);

        this.buttonGetPhones.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                askPermissionAndGetPhoneNumbers();
            }
        });
    }

    private void askPermissionAndGetPhoneNumbers() {

        // With Android Level >= 23, you have to ask the user
        // for permission to get Phone Number.
        if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.M) { // 23

            // Check if we have READ_PHONE_STATE permission
            int readPhoneStatePermission = ActivityCompat.checkSelfPermission(this,
                    Manifest.permission.READ_PHONE_STATE);

            if ( readPhoneStatePermission != PackageManager.PERMISSION_GRANTED) {
                // If don't have permission so prompt the user.
                this.requestPermissions(
                        new String[]{Manifest.permission.READ_PHONE_STATE},
                        MY_PERMISSION_REQUEST_CODE_PHONE_STATE
                );
                return;
            }
        }
        this.getPhoneNumbers();
    }

    // Need to ask user for permission: android.permission.READ_PHONE_STATE
    @SuppressLint("MissingPermission")
    private void getPhoneNumbers() {
        try {
            TelephonyManager manager = (TelephonyManager) this.getSystemService(Context.TELEPHONY_SERVICE);

            String phoneNumber1 = manager.getLine1Number();

            this.editTextPhoneNumbers.setText(phoneNumber1);

            //
            Log.i( LOG_TAG,"Your Phone Number: " + phoneNumber1);
            Toast.makeText(this,"Your Phone Number: " + phoneNumber1,
                    Toast.LENGTH_LONG).show();

            // Other Informations:
            if(android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.O) { // API Level 26.
                String imei = manager.getImei();
                int phoneCount = manager.getPhoneCount();

                Log.i(LOG_TAG,"Phone Count: " + phoneCount);
                Log.i(LOG_TAG,"EMEI: " + imei);
            }
            if(android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.P) { // API Level 28.
                SignalStrength signalStrength = manager.getSignalStrength();
                int level = signalStrength.getLevel();

                Log.i(LOG_TAG,"Signal Strength Level: " + level);
            }

        } catch (Exception ex) {
            Log.e( LOG_TAG,"Error: ", ex);
            Toast.makeText(this,"Error: " + ex.getMessage(),
                    Toast.LENGTH_LONG).show();
            ex.printStackTrace();
        }
    }


    // When you have the request results
    @Override
    public void onRequestPermissionsResult(int requestCode,
                                           String permissions[], int[] grantResults) {

        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        //
        switch (requestCode) {
            case MY_PERMISSION_REQUEST_CODE_PHONE_STATE: {

                // Note: If request is cancelled, the result arrays are empty.
                // Permissions granted (SEND_SMS).
                if (grantResults.length > 0
                        && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                    Log.i( LOG_TAG,"Permission granted!");
                    Toast.makeText(this, "Permission granted!", Toast.LENGTH_LONG).show();

                    this.getPhoneNumbers();

                }
                // Cancelled or denied.
                else {
                    Log.i( LOG_TAG,"Permission denied!");
                    Toast.makeText(this, "Permission denied!", Toast.LENGTH_LONG).show();
                }
                break;
            }
        }
    }


    // When results returned
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == MY_PERMISSION_REQUEST_CODE_PHONE_STATE) {
            if (resultCode == RESULT_OK) {
                // Do something with data (Result returned).
                Toast.makeText(this, "Action OK", Toast.LENGTH_LONG).show();
            } else if (resultCode == RESULT_CANCELED) {
                Toast.makeText(this, "Action Cancelled", Toast.LENGTH_LONG).show();
            } else {
                Toast.makeText(this, "Action Failed", Toast.LENGTH_LONG).show();
            }
        }
    }
}