using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

using System.Data.OleDb;
using System.Media;

namespace QuaySoTrungThuong
{
    public partial class Form1 : Form
    {
        public int SpinReel_1;
        public int SpinReel_2;
        public int SpinReel_3;
        private OleDbConnection ket_noi;
        

        public Form1()
        {
            InitializeComponent();
        }

        private void btnPlay_Click(object sender, EventArgs e)
        {
            this.Timer1.Interval = 15;
            Timer1.Start();

            string sPathSound = "NhacXoSo.wav";                        
            SoundPlayer player = new SoundPlayer(sPathSound);
            player.PlayLooping();            

            this.lblSo1.Text = "?";
            this.lblSo2.Text = "?";
            this.lblSo3.Text = "?";            
            btnAddList.Visible = false;

            ClearForm();

            btnPlay.Visible = false;
            btnStop.Visible = true;
            btnStop.Location = new Point(739, 136);

            ClearForm();
           
        }

        private void btnAddList_Click(object sender, EventArgs e)
        {
            int igiai = 0;
            try
            {
                switch (this.cboGiaiThuong.SelectedIndex)
                {
                    case 0:
                        if (lblGiaiNhat.Text == "")
                        {
                            this.lblGiaiNhat.Text = lblMPDT.Text;
                            this.lblGiaiNhatTen.Text = lblTen.Text;
                            lblDonviNhat.Text = lblDonvi.Text;
                            igiai = cboGiaiThuong.SelectedIndex + 1;
                        }
                        else
                        {
                            MessageBox.Show("Đã đủ giải.");
                            return;
                        }
                        break;
                    case 1:
                        if (lblGiaiNhi1.Text == "")
                        {
                            this.lblGiaiNhi1.Text = lblMPDT.Text;
                            this.lblGiaiNhiTen1.Text = lblTen.Text;
                            lblDonviNhi1.Text = lblDonvi.Text;
                            igiai = cboGiaiThuong.SelectedIndex + 1;
                        }
                        else if (this.lblGiaiNhi2.Text == "")
                        {
                            if (lblMPDT.Text != lblGiaiNhi1.Text)
                            {
                                this.lblGiaiNhi2.Text = lblMPDT.Text;
                                this.lblGiaiNhiTen2.Text = lblTen.Text;
                                lblDonviNhi2.Text = lblDonvi.Text;
                                igiai = cboGiaiThuong.SelectedIndex + 1;

                                cboGiaiThuong.SelectedIndex = 0;
                                MessageBox.Show("Xin mời quý lãnh đạo quay tiếp Giải Nhất.");                                
                            }
                            else
                            {
                                MessageBox.Show("Số phiếu này đã có.");
                                return;
                            }
                        }
                        else
                        {
                            MessageBox.Show("Đã đủ giải.");
                            return;
                        }
                        break;
                    case 2:
                        if (lblGiaiBa1.Text == "")
                        {
                            this.lblGiaiBa1.Text = lblMPDT.Text;
                            this.lblGiaiBaTen1.Text = lblTen.Text;
                            lblDonviBa1.Text = lblDonvi.Text;
                            igiai = cboGiaiThuong.SelectedIndex + 1;
                        }
                        else if (this.lblGiaiBa2.Text == "")
                        {
                            if (lblMPDT.Text != lblGiaiBa1.Text)
                            {
                                this.lblGiaiBa2.Text = lblMPDT.Text;
                                this.lblGiaiBaTen2.Text = lblTen.Text;
                                lblDonviBa2.Text = lblDonvi.Text;
                                igiai = cboGiaiThuong.SelectedIndex + 1;
                            }
                            else
                            {
                                MessageBox.Show("Số phiếu này đã có.");
                                return;
                            }                            
                        }
                        else if (this.lblGiaiBa3.Text == "")
                        {
                            if (lblMPDT.Text != lblGiaiBa2.Text)
                            {
                                this.lblGiaiBa3.Text = lblMPDT.Text;
                                this.lblGiaiBaTen3.Text = lblTen.Text;
                                lblDonviBa3.Text = lblDonvi.Text;
                                igiai = cboGiaiThuong.SelectedIndex + 1;
                            }
                            else
                            {
                                MessageBox.Show("Số phiếu này đã có.");
                                return;
                            }                            
                        }
                        else if (this.lblGiaiBa4.Text == "")
                        {
                            if (lblMPDT.Text != lblGiaiBa3.Text)
                            {
                                this.lblGiaiBa4.Text = lblMPDT.Text;
                                this.lblGiaiBaTen4.Text = lblTen.Text;
                                lblDonviBa4.Text = lblDonvi.Text;
                                igiai = cboGiaiThuong.SelectedIndex + 1;
                            }
                            else
                            {
                                MessageBox.Show("Số phiếu này đã có.");
                                return;
                            }                            
                        }
                        else if (this.lblGiaiBa5.Text == "")
                        {
                            if (lblMPDT.Text != lblGiaiBa4.Text)
                            {
                                this.lblGiaiBa5.Text = lblMPDT.Text;
                                this.lblGiaiBaTen5.Text = lblTen.Text;
                                lblDonviBa5.Text = lblDonvi.Text;
                                igiai = cboGiaiThuong.SelectedIndex + 1;

                                cboGiaiThuong.SelectedIndex = 1;
                                MessageBox.Show("Xin mời quý lãnh đạo quay tiếp Giải Nhì.");                                
                            }
                            else
                            {
                                MessageBox.Show("Số phiếu này đã có.");
                                return;
                            }                            
                        }
                        else
                        {
                            MessageBox.Show("Đã đủ giải.");
                            return;
                        }
                        break;                   
                }

                this.tao_ket_noi();
                OleDbCommand command = new OleDbCommand("update data set trangthai = 0, giai = " + igiai + " where mpdt = " + this.lblMPDT.Text, this.ket_noi);
                this.ket_noi.Open();
                command.ExecuteNonQuery();
                //MessageBox.Show("Thêm thành công.");
                this.ket_noi.Close();                
            }
            catch
            {
                MessageBox.Show("Thất bại rồi!");
            }            
        }

        private void Timer1_Tick(object sender, EventArgs e)
        {
            string sPathSound = "NhacXoSo.wav";
            SoundPlayer player = new SoundPlayer(sPathSound);           

            this.SpinReel_1 = new Random().Next(0, 10);
            this.SpinReel_2 = new Random().Next(0, 10);
            this.SpinReel_3 = new Random().Next(0, 10);
            this.SpinReels();                      
            
        }

        private void SearchNumber()
        {
            try
            {
                Random random = new Random();
                int maxValue = 0;
                int minValue = 0;
                int randomValue;
                string query = "";
                string DataPath = "data.mdb";
                
                string sAccessCon = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source = " + DataPath + ";Mode=ReadWrite|Share Deny None;Persist Security Info=False";
                
                OleDbConnection connection = new OleDbConnection(sAccessCon);
                OleDbCommand commandMax = new OleDbCommand("select max(mpdt) from data where trangthai = 1", connection);
                OleDbCommand commandMin = new OleDbCommand("select min(mpdt) from data where trangthai = 1", connection);                
              
                if (connection.State == ConnectionState.Open)
                    connection.Close();

                connection.Open();

                maxValue = int.Parse(commandMax.ExecuteScalar().ToString());
                minValue = int.Parse(commandMin.ExecuteScalar().ToString());
                randomValue = random.Next(minValue, maxValue);
                query = "select mpdt, ten, phong, donvi from data where trangthai = 1 and mpdt="; 
                OleDbDataReader reader = new OleDbCommand(query + randomValue, connection).ExecuteReader();
                reader.Read();
                while (!reader.HasRows)
                {
                    randomValue = random.Next(minValue, maxValue);
                    reader = new OleDbCommand(query + randomValue, connection).ExecuteReader();
                    reader.Read();
                }                
                reader.GetValue(0).ToString();
                lblSo1.Text = reader.GetValue(0).ToString().Substring(0, 1);
                lblSo2.Text = reader.GetValue(0).ToString().Substring(1, 1);
                lblSo3.Text = reader.GetValue(0).ToString().Substring(2, 1);
                this.lblTen.Text = reader.GetValue(1).ToString();
                this.label5.Text = " - ";
                this.lblMPDT.Text = reader.GetValue(0).ToString();
                this.lblPhong.Text = reader.GetValue(2).ToString();
                this.lblDonvi.Text = reader.GetValue(3).ToString();               
                
            }
            catch (Exception Ex)
            {
            }
        }

        private void SpinReels()
        {
            switch (this.SpinReel_1)
            {
                case 0:
                    this.lblSo1.Text = "0";
                    break;

                case 1:
                    this.lblSo1.Text = "1";
                    break;

                case 2:
                    this.lblSo1.Text = "2";
                    break;

                case 3:
                    this.lblSo1.Text = "3";
                    break;

                case 4:
                    this.lblSo1.Text = "4";
                    break;

                case 5:
                    this.lblSo1.Text = "5";
                    break;

                case 6:
                    this.lblSo1.Text = "6";
                    break;

                case 7:
                    this.lblSo1.Text = "7";
                    break;

                case 8:
                    this.lblSo1.Text = "8";
                    break;

                case 9:
                    this.lblSo1.Text = "9";
                    break;
            }
            switch (this.SpinReel_2)
            {
                case 1:
                    this.lblSo2.Text = "9";
                    break;

                case 2:
                    this.lblSo2.Text = "8";
                    break;

                case 3:
                    this.lblSo2.Text = "7";
                    break;

                case 4:
                    this.lblSo2.Text = "6";
                    break;

                case 5:
                    this.lblSo2.Text = "5";
                    break;

                case 6:
                    this.lblSo2.Text = "4";
                    break;

                case 7:
                    this.lblSo2.Text = "3";
                    break;

                case 8:
                    this.lblSo2.Text = "2";
                    break;

                case 9:
                    this.lblSo2.Text = "1";
                    break;
                case 0:
                    this.lblSo2.Text = "0";
                    break;
            }
            switch (this.SpinReel_3)
            {
                case 1:
                    this.lblSo3.Text = "4";
                    break;

                case 2:
                    this.lblSo3.Text = "3";
                    break;

                case 3:
                    this.lblSo3.Text = "2";
                    break;

                case 4:
                    this.lblSo3.Text = "1";
                    break;

                case 5:
                    this.lblSo3.Text = "5";
                    break;

                case 6:
                    this.lblSo3.Text = "9";
                    break;

                case 7:
                    this.lblSo3.Text = "8";
                    break;

                case 8:
                    this.lblSo3.Text = "7";
                    break;

                case 9:
                    this.lblSo3.Text = "6";
                    break;
                case 0:
                    this.lblSo3.Text = "0";
                    break;
            }
        }

        public class PublicVariable
        {
            public static int i;
        }

        private void btnStop_Click(object sender, EventArgs e)
        {
            new SoundPlayer("NhacXoSo.wav").Stop();

            string sPathSound1 = "WindowsDing.wav";
            SoundPlayer player1 = new SoundPlayer(sPathSound1);
            player1.Play();

            this.SearchNumber();

            this.Timer1.Enabled = false;            
            btnAddList_Click(null, null);
            btnStop.Visible = false;
            btnPlay.Visible = true;

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            lblTitle.Text = "";
            this.btnPlay.Select();
            btnAddList.Visible = false;           

            ClearForm();

            lblGiaiNhat.Text = "";
            lblGiaiNhatTen.Text = "";
            lblDonviNhat.Text = "";
            lblGiaiNhi1.Text = "";
            lblGiaiNhiTen1.Text = "";
            lblDonviNhi1.Text = "";
            lblGiaiNhi2.Text = "";
            lblGiaiNhiTen2.Text = "";
            lblDonviNhi2.Text = "";
            lblGiaiBa1.Text = "";
            lblGiaiBaTen1.Text = "";
            lblDonviBa1.Text = "";
            lblGiaiBa2.Text = "";
            lblGiaiBaTen2.Text = "";
            lblDonviBa2.Text = "";
            lblGiaiBa3.Text = "";
            lblGiaiBaTen3.Text = "";
            lblDonviBa3.Text = "";
            lblGiaiBa4.Text = "";
            lblGiaiBaTen4.Text = "";
            lblDonviBa4.Text = "";
            lblGiaiBa5.Text = "";
            lblGiaiBaTen5.Text = "";
            lblDonviBa5.Text = "";

            btnStop.Visible = false;
            cboGiaiThuong.SelectedIndex = 2;
        }

        private void tao_ket_noi()
        {
            string DataPath = "data.mdb";            
            string sAccessCon = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source = " + DataPath + ";Mode=ReadWrite|Share Deny None;Persist Security Info=False";
                
            try
            {
                this.ket_noi = new OleDbConnection(sAccessCon);
            }
            catch (Exception ex)
            {                
            }
        }

        private void ClearForm()
        {
            lblTen.Text = "";
            lblPhong.Text = "";
            lblDonvi.Text = "";
            lblMPDT.Text = "";
            label5.Text = "";
        }

        private void cboGiaiThuong_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (cboGiaiThuong.SelectedIndex == 2)
            {
                lblTitle.Text = "Giải ba: 01 Máy ảnh trị giá 05 triệu đồng";
            }
            else if (cboGiaiThuong.SelectedIndex == 1)
            {
                lblTitle.Text = "Giải nhì: 01 Máy tính bảng trị giá 10 triệu đồng";
            }
            else 
            {
                lblTitle.Text = "Giải nhất: 01 tivi màn hình phẳng trị giá 15 triệu đồng";
            }            
        }
        
    }
}
